<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects - Slugworks Summer of Code</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Roboto', 'sans-serif'],
                    },
                    colors: {
                        'gsoc-blue': '#4285F4',
                        'gsoc-red': '#EA4335',
                        'gsoc-yellow': '#FBBC04',
                        'gsoc-green': '#34A853',
                        'gsoc-bg': '#F8F9FA',
                    }
                }
            }
        }
    </script>

    <style>
        /* Card Hover Effect */
        .project-card {
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .project-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-color: #34A853;
            /* Green border on hover */
        }

        /* Tag Styling */
        .tech-tag {
            background-color: #f3f4f6;
            color: #4b5563;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 9999px;
            font-weight: 500;
        }
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm fixed w-full z-50 h-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Area -->
                <div class="flex items-center">
                    <a href="../index.html" class="flex-shrink-0 flex items-center gap-2 cursor-pointer group">
                        <div
                            class="w-10 h-10 bg-gsoc-green rounded-full flex items-center justify-center text-white group-hover:bg-green-600 transition">
                            <i class="ph ph-arrow-left text-xl"></i>
                        </div>
                        <span class="font-medium text-xl text-gray-800 tracking-tight">Back to <span
                                class="font-bold text-gsoc-green">Home</span></span>
                    </a>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    <span class="hidden md:block text-sm text-gray-500">Viewing 2025 Projects</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header & Search -->
    <div class="bg-white border-b border-gray-200 pt-24 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                        Approved Projects
                    </h1>
                    <p class="text-lg text-gray-500 mt-2">
                        Discover the incredible work done by students this summer.
                    </p>
                </div>

                <!-- Simple Search Input -->
                <div class="w-full md:w-auto">
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="ph ph-magnifying-glass text-gray-400"></i>
                        </div>
                        <input type="text" name="search" id="search"
                            class="focus:ring-gsoc-green focus:border-gsoc-green block w-full md:w-80 pl-10 sm:text-sm border-gray-300 rounded-md py-2 border"
                            placeholder="Search projects or organizations...">
                    </div>
                </div>
            </div>

            <!-- Minimal Filter Tabs (Placeholder) -->
            <div
                class="flex gap-4 mt-6 overflow-x-auto pb-2 text-sm font-medium text-gray-500 border-b border-gray-100">
                <button class="text-gsoc-green border-b-2 border-gsoc-green pb-2 whitespace-nowrap">All
                    Projects</button>
                <button class="hover:text-gray-700 pb-2 whitespace-nowrap">Web</button>
                <button class="hover:text-gray-700 pb-2 whitespace-nowrap">AI/ML</button>
                <button class="hover:text-gray-700 pb-2 whitespace-nowrap">Cloud</button>
                <button class="hover:text-gray-700 pb-2 whitespace-nowrap">Mobile</button>
            </div>
        </div>
    </div>

    <!-- Projects Grid -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 flex-grow">

        <!-- Loading State (Optional visual cue for backend loading) -->
        <!-- <div class="text-center py-12 text-gray-400">Loading projects...</div> -->

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card Template 1 -->
            <div class="project-card bg-white rounded-lg p-6 flex flex-col h-full cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded bg-blue-100 flex items-center justify-center text-gsoc-blue">
                        <i class="ph ph-brackets-angle text-xl"></i>
                    </div>
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                        Passed
                    </span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Distributed Cache System</h3>
                <p class="text-sm text-gsoc-green font-medium mb-3">Organization: Cloud Native Computing</p>
                <p class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3">
                    Implementing a distributed caching mechanism using Go to improve microservice latency. This project
                    focuses on high availability and fault tolerance.
                </p>

                <div class="border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold">
                                JD</div>
                            <span class="text-xs text-gray-500 ml-2">John Doe</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="tech-tag">Go</span>
                            <span class="tech-tag">Cloud</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Template 2 -->
            <div class="project-card bg-white rounded-lg p-6 flex flex-col h-full cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded bg-yellow-100 flex items-center justify-center text-gsoc-yellow">
                        <i class="ph ph-robot text-xl"></i>
                    </div>
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                        Passed
                    </span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Accessible UI Components</h3>
                <p class="text-sm text-gsoc-green font-medium mb-3">Organization: Open Design Lib</p>
                <p class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3">
                    Creating a set of strictly accessible React components that comply with WCAG 2.1 standards.
                </p>

                <div class="border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold">
                                AS</div>
                            <span class="text-xs text-gray-500 ml-2">Alice Smith</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="tech-tag">React</span>
                            <span class="tech-tag">a11y</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Template 3 -->
            <div class="project-card bg-white rounded-lg p-6 flex flex-col h-full cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded bg-red-100 flex items-center justify-center text-gsoc-red">
                        <i class="ph ph-chart-line-up text-xl"></i>
                    </div>
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                        Passed
                    </span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Data Pipeline Optimizer</h3>
                <p class="text-sm text-gsoc-green font-medium mb-3">Organization: Data Science Org</p>
                <p class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3">
                    Optimizing the ETL process for large datasets using Apache Beam and Python.
                </p>

                <div class="border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold">
                                MK</div>
                            <span class="text-xs text-gray-500 ml-2">Mike Kim</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="tech-tag">Python</span>
                            <span class="tech-tag">Data</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Template 4 -->
            <div class="project-card bg-white rounded-lg p-6 flex flex-col h-full cursor-pointer">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-10 h-10 rounded bg-purple-100 flex items-center justify-center text-purple-600">
                        <i class="ph ph-game-controller text-xl"></i>
                    </div>
                    <span
                        class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                        Passed
                    </span>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-1">Physics Engine 2.0</h3>
                <p class="text-sm text-gsoc-green font-medium mb-3">Organization: Game Dev Alliance</p>
                <p class="text-gray-500 text-sm mb-4 flex-grow line-clamp-3">
                    Overhauling the collision detection system for better performance on mobile devices.
                </p>

                <div class="border-t border-gray-100 pt-4 mt-auto">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div
                                class="h-6 w-6 rounded-full bg-gray-200 flex items-center justify-center text-xs text-gray-500 font-bold">
                                SJ</div>
                            <span class="text-xs text-gray-500 ml-2">Sarah Jones</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="tech-tag">C++</span>
                            <span class="tech-tag">GameDev</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Pagination Placeholder -->
        <div class="mt-12 flex justify-center">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <i class="ph ph-caret-left"></i>
                </a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                <a href="#"
                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                <a href="#"
                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <i class="ph ph-caret-right"></i>
                </a>
            </nav>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex items-center justify-center gap-2 mb-4 text-gray-600">
                <i class="ph ph-code text-xl"></i>
                <span class="font-bold">Slugworks Open Source</span>
            </div>
            <p class="text-sm text-gray-500">&copy; Slugworks 2025-2026</p>
        </div>
    </footer>

</body>

</html>