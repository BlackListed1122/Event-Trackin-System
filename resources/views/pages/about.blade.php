<x-layout>
    <x-header></x-header>
    <div class="min-h-screen bg-gray-100 mt-50">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Create Event</h1>
                    <p class="text-gray-500">Manage and publish municipal events with PDF attachment</p>
                </div>

                <button class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
                    Save Event
                </button>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <form class="space-y-6">

                    <!-- Event Title -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Title
                        </label>
                        <input type="text" placeholder="Enter event title"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Date + Time -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Event Date
                            </label>
                            <input type="date"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Event Time
                            </label>
                            <input type="time"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location
                        </label>
                        <input type="text" placeholder="Enter event location"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Status
                        </label>
                        <select
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option>Upcoming</option>
                            <option>Ongoing</option>
                            <option>Finished</option>
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Event Image
                        </label>

                        <div
                            class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-500 transition">
                            <input type="file" id="imageUpload" class="hidden">
                            <label for="imageUpload" class="cursor-pointer">
                                <p class="text-gray-500">Click to upload event image</p>
                                <p class="text-sm text-gray-400 mt-2">PNG, JPG up to 5MB</p>
                            </label>
                        </div>
                    </div>

                    <!-- PDF Attachment -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Attach PDF File
                        </label>

                        <div
                            class="border-2 border-dashed border-red-300 rounded-2xl p-8 text-center hover:border-red-500 transition">
                            <input type="file" id="pdfUpload" accept=".pdf" class="hidden">
                            <label for="pdfUpload" class="cursor-pointer">
                                <p class="text-gray-500">Click to upload PDF attachment</p>
                                <p class="text-sm text-gray-400 mt-2">PDF only, max 10MB</p>
                            </label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Description
                        </label>
                        <textarea rows="6" placeholder="Write event details here..."
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button"
                            class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                            Cancel
                        </button>

                        <button type="submit"
                            class="px-8 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700 shadow-md transition">
                            Publish Event
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- <div class="min-h-screen bg-gray-100 p-6">
        <div class="max-w-5xl mx-auto">

            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Create Event</h1>
                    <p class="text-gray-500">Manage and publish municipal events</p>
                </div>

                <button class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
                    Save Event
                </button>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8">

                <form class="space-y-6">

                    <!-- Event Title -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Title
                        </label>
                        <input type="text" placeholder="Enter event title"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Date + Time -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Event Date
                            </label>
                            <input type="date"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Event Time
                            </label>
                            <input type="time"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Location
                        </label>
                        <input type="text" placeholder="Enter location"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Status
                        </label>
                        <select
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                            <option>Upcoming</option>
                            <option>Ongoing</option>
                            <option>Finished</option>
                        </select>
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Upload Event Image
                        </label>
                        <div
                            class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-500 transition">
                            <input type="file" class="hidden" id="upload">
                            <label for="upload" class="cursor-pointer">
                                <p class="text-gray-500">Click to upload or drag and drop</p>
                                <p class="text-sm text-gray-400 mt-2">PNG, JPG up to 5MB</p>
                            </label>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Event Description
                        </label>
                        <textarea rows="6" placeholder="Write event details here..."
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button"
                            class="px-6 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                            Cancel
                        </button>

                        <button type="submit"
                            class="px-8 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700 shadow-md transition">
                            Publish Event
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div> --}}
</x-layout>
