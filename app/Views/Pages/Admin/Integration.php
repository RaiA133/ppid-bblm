<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-stone-100 py-10" id="header-home" data-scroll>

    <section class="container mx-auto px-4 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Slack</h2>
                <p class="flex mt-2">
                    <img alt="Slack icon" src="https://cdn-icons-png.flaticon.com/512/2111/2111615.png" class="w-12 h-12 inline-block mr-4" />
                    Slack is an instant messaging program designed by Slack Technologies and owned by Salesforce.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle" checked="checked" />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Facebook</h2>
                <p class="flex mt-2">
                    <img alt="Facebook icon" src="https://cdn-icons-png.flaticon.com/512/124/124010.png" class="w-12 h-12 inline-block mr-4" />
                    Meta Platforms, Inc., doing business as Meta and formerly named Facebook, Inc., and TheFacebook.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Linkedin</h2>
                <p class="flex mt-2">
                    <img alt="Linkedin icon" src="https://cdn-icons-png.flaticon.com/512/174/174857.png" class="w-12 h-12 inline-block mr-4" />
                    LinkedIn is a business and employment-focused social media platform that works through websites and mobile apps.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" checked />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Google Ads</h2>
                <p class="flex mt-2">
                    <img alt="Google Ads icon" src="https://cdn-icons-png.flaticon.com/512/2301/2301145.png" class="w-12 h-12 inline-block mr-4" />
                    Google Ads is an online advertising platform developed by Google, where advertisers bid to display brief advertisements, service offerings.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Gmail</h2>
                <p class="flex mt-2">
                    <img alt="Gmail icon" src="https://cdn-icons-png.flaticon.com/512/5968/5968534.png" class="w-12 h-12 inline-block mr-4" />
                    Gmail is a free email service provided by Google. As of 2019, it had 1.5 billion active users worldwide.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Salesforce</h2>
                <p class="flex mt-2">
                    <img alt="Salesforce icon" src="https://cdn-icons-png.flaticon.com/512/5968/5968880.png" class="w-12 h-12 inline-block mr-4" />
                    It provides customer relationship management software and applications focused on sales, customer service, marketing automation.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" />
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Hubspot</h2>
                <p class="flex mt-2">
                    <img alt="Hubspot icon" src="https://cdn-icons-png.flaticon.com/512/5968/5968872.png" class="w-12 h-12 inline-block mr-4" />
                    American developer and marketer of software products for inbound marketing, sales, and customer service.
                </p>
                <div class="mt-6 text-right">
                    <input type="checkbox" class="toggle toggle-success toggle-lg" />
                </div>
            </div>
        </div>
    </section>

</div>

<?php $this->endSection(); ?>