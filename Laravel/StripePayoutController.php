<?php

namespace App\Http\Controllers;
use Stripe\File;
use Stripe\Token;
use Stripe\Payout;
use Stripe\Stripe;
use Stripe\Account;
use App\Models\User;
use Stripe\Customer;
use Stripe\Transfer;

/* the controller for client account to customer account  send money*/
class PayoutController extends Controller
{
    /**
     * Process payout for a user including creating a Stripe Customer, uploading identity document, creating a Custom Stripe Account,
     * attaching a bank account, transferring funds, creating a payout, and handling exceptions.
     *
     * @return \Illuminate\Http\JsonResponse Returns JSON response with success status and payout details or error message
     */
    public function payoutUser()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // Define the amount to be paid out in cents (e.g., $10.00 -> 1000 cents)
        $amount = 2150; // Example amount

        try {

            $email = 'final@stage.com';
            $name = 'Final Stage';

            // Step 1: Create a Stripe Customer
            $customer = Customer::create([
                'email' => $email, // Use the customer's email
                'name' => $name,
            ]);

            // Step 2: Upload the identity document to Stripe
            $identityFile = File::create([
                'purpose' => 'identity_document',
                'file' => fopen('C:\Users\joshi\Downloads\Documents\identity_document.pdf', 'r'), // Path to your identity document
            ]);

            // Step 3: Create a Custom Stripe Account
            $account = Account::create([
                'type' => 'custom',
                'country' => 'US',
                'email' => $email, // Use the user's email
                'capabilities' => [
                    'transfers' => ['requested' => true],
                ],
                'business_type' => 'individual',
                'business_profile' => [
                    'url' => 'https://google2.com', // User's website URL
                    'product_description' => 'Product description goes here', // Product information
                ],
                'individual' => [
                    'first_name' => $name,
                    'last_name' => 'test',
                    'dob' => [
                        'day' => 1,
                        'month' => 1,
                        'year' => 1990,
                    ],
                    'ssn_last_4' => '9655', // Last 4 digits of the user's SSN
                    'id_number' => '123459655', // Full SSN for user identification
                    'address' => [
                        'line1' => '123 Test St',
                        'city' => 'Test City',
                        'state' => 'CA',
                        'postal_code' => '12345',
                        'country' => 'US',
                    ],
                    'email' => $email, // Use the user's email
                    'verification' => [
                        'document' => [
                            'front' => $identityFile->id, // Identity document file ID
                        ],
                    ],
                ],
                'tos_acceptance' => [
                    'date' => time(),
                    'ip' => request()->ip(),
                ],
                'metadata' => [
                    'customer_id' => $customer->id, // Associate the customer ID with the account
                ],
            ]);

            // Step 4: Create a bank account token
            $bankAccountToken = Token::create([
                'bank_account' => [
                    'country' => 'US',
                    'currency' => 'usd',
                    'account_holder_name' => 'payout',
                    'account_holder_type' => 'individual',
                    'routing_number' => '110000000',
                    'account_number' => '000123456789',
                ],
            ]);

            // Attach the bank account to the Stripe account
            $account->external_accounts->create([
                'external_account' => $bankAccountToken->id,
            ]);

            // Step 5: Transfer funds to the connected account
            $transfer = Transfer::create([
                'amount' => $amount,
                'currency' => 'usd',
                'destination' => $account->id,
            ]);

            // Step 6: Create a payout to the bank account
            $payout = Payout::create([
                'amount' => $amount,
                'currency' => 'usd',
            ], [
                'stripe_account' => $account->id,
            ]);

            return response()->json(['success' => true, 'payout' => $payout]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
