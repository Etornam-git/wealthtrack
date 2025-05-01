<x-layout>
    <x-slot:pagename>
        Help Center
    </x-slot:pagename>

    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Welcome to WealthTrack Help Center</h1>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Everything you need to know about managing your finances with WealthTrack
            </p>
        </div>

        <!-- Version Information -->
        <div class="bg-gray-900 rounded-xl shadow-lg p-8 mb-12 border border-gray-700">
            <div class="flex items-center mb-6">
                <div class="bg-blue-500 p-3 rounded-lg mr-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-white">About WealthTrack v1.0</h2>
            </div>
            
            <div class="space-y-6">
                <p class="text-lg text-white leading-relaxed">
                    Welcome to the first version of WealthTrack! We're excited to bring you this initial release focused on core financial management features. While this version provides essential tools for tracking transactions, managing savings, and budgeting, we're actively working on expanding our feature set.
                </p>
                
                <div class="bg-gray-800 rounded-lg p-6 shadow-sm border border-gray-700">
                    <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        Coming Soon
                    </h3>
                    <p class="text-white mb-4">
                        In future updates, we plan to introduce:
                    </p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <li class="flex items-center text-white bg-gray-700/50 p-3 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Multiple payment method integration
                        </li>
                        <li class="flex items-center text-white bg-gray-700/50 p-3 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Advanced analytics and reporting
                        </li>
                        <li class="flex items-center text-white bg-gray-700/50 p-3 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Investment tracking capabilities
                        </li>
                        <li class="flex items-center text-white bg-gray-700/50 p-3 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Enhanced security features
                        </li>
                        <!-- <li class="flex items-center text-white bg-gray-700/50 p-3 rounded-lg">
                            <svg class="w-5 h-5 mr-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Mobile app availability
                        </li> -->
                    </ul>
                </div>

                <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
                    <p class="text-white leading-relaxed">
                        We value your feedback and are committed to continuously improving WealthTrack. Your experience with this version will help shape future updates and enhancements.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="space-y-12">
            <!-- Getting Started -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Getting Started</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">1. Create Your Account</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Start by creating your account and setting up your profile. This will be your financial hub where you can manage all your transactions, savings, and budgets.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">2. Add Your Bank Accounts</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Add your bank accounts to start tracking your finances. You can add multiple accounts and manage them all from one place.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Managing Transactions -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Managing Transactions</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Making Transactions</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            You can create transactions for both deposits and withdrawals. Each transaction requires:
                        </p>
                        <ul class="list-disc pl-6 mt-2 text-gray-600 dark:text-gray-300">
                            <li>Selecting an account</li>
                            <li>Specifying the amount (maximum: ₵999,999,999.99)</li>
                            <li>Choosing the transaction type (deposit/withdrawal)</li>
                            <li>Adding an optional description</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Transaction Limits</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            - Maximum transaction amount: ₵999,999,999.99<br>
                            - Minimum transaction amount: ₵0.01<br>
                            - Decimal places allowed: 2
                        </p>
                    </div>
                </div>
            </section>

            <!-- Savings Plans -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Savings Plans</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Creating a Savings Plan</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Create personalized savings plans with the following options:
                        </p>
                        <ul class="list-disc pl-6 mt-2 text-gray-600 dark:text-gray-300">
                            <li>Set a target amount</li>
                            <li>Choose saving regularity (daily, weekly, biweekly, monthly, quarterly, yearly)</li>
                            <li>Set amount per interval</li>
                            <li>Enable automatic savings</li>
                            <li>Set start and end dates</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Managing Savings</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            - Track your progress towards your savings goals<br>
                            - Make manual deposits at any time<br>
                            - View your savings history<br>
                            - Pause or complete savings plans
                        </p>
                    </div>
                </div>
            </section>

            <!-- Budgeting -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Budgeting</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Creating Budgets</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            Create budgets to track your spending in different categories:
                        </p>
                        <ul class="list-disc pl-6 mt-2 text-gray-600 dark:text-gray-300">
                            <li>Set budget categories</li>
                            <li>Define spending limits</li>
                            <li>Track expenses against your budget</li>
                            <li>View budget progress</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Security -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Security</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Account Security</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            - Your account is protected with secure authentication<br>
                            - All transactions are encrypted<br>
                            - Regular security updates<br>
                            - Secure session management
                        </p>
                    </div>
                </div>
            </section>

            <!-- Support -->
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Need More Help?</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-600 dark:text-gray-300">
                            If you need additional assistance or have questions not covered in this guide, please contact our support team at:(COMING SOON )
                        </p>
                        <p class="mt-2 text-indigo-600 dark:text-indigo-400">
                            support@wealthtrack.com
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout> 