<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<!-- Success Message Section -->
<section class="min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-gray-50 flex items-center justify-center py-16">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white shadow-2xl rounded-3xl p-8 sm:p-12">
            <!-- Success Icon -->
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <!-- Success Message -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Message Sent Successfully!
            </h1>
            
            <p class="text-lg text-gray-600 mb-6">
                Thank you, <span class="font-semibold text-gray-900"><?= esc($name) ?></span>. Your message has been received and processed.
            </p>
            
            <!-- Ticket Information -->
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <p class="text-sm font-medium text-gray-700 mb-2">Your Ticket Reference</p>
                <p class="text-2xl font-bold text-blue-600 font-mono"><?= esc($ticket_id) ?></p>
                <p class="text-sm text-gray-600 mt-2">
                    Please save this reference number for your records
                </p>
            </div>
            
            <!-- Next Steps -->
            <div class="text-center mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-3">What Happens Next?</h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                            <span class="text-blue-600 font-semibold">1</span>
                        </div>
                        <p class="text-gray-600">Message Review</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                            <span class="text-blue-600 font-semibold">2</span>
                        </div>
                        <p class="text-gray-600">Expert Assignment</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                            <span class="text-blue-600 font-semibold">3</span>
                        </div>
                        <p class="text-gray-600">Response Within 24hrs</p>
                    </div>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= base_url('/') ?>" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Return Home
                </a>
                
                <a href="<?= base_url('/solutions') ?>" 
                   class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg hover:bg-blue-600 hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    View Our Solutions
                </a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
