<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

    <section class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-base-100 shadow-md rounded-lg p-6">

            <form action="">
                <h2 class="text-2xl font-semibold mb-4">Profile</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-base-700">Name :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-base-700">Email :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-base-700">Title :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-base-700">Place :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " required />
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <label class="block text-sm font-medium text-base-700">About :</label>
                        <textarea class="textarea textarea-bordered mt-1 rounded-sm w-full h-32" required ></textarea>
                    </div>
                </div>

                <div class="divider my-6"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-base-700">Language :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-base-700">Timezone :</label>
                        <input type="text" class="input input-bordered w-full rounded-md mt-1 h-10 " />
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-1 flex items-center gap-4 justify-between mx-10">
                        <label class="flex items-center">
                            <input type="checkbox" class="mr-2" checked>
                            <span class="text-sm font-medium text-base-700">Sync Data</span>
                        </label>
                        <button type="submit" class="btn w-32 md:w-auto lg:w-auto btn-neutral px-4 py-2 text-neutral-content font-semibold rounded-md">
                            Update
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>

</div>

<?php $this->endSection(); ?>