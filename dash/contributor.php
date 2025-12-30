<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contributor Dashboard - Slugworks SOE Summer of Code</title>

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
        .sidebar-link {
            transition: all 0.2s;
        }

        .sidebar-link.active {
            background-color: #eff6ff;
            /* blue-50 */
            color: #1e40af;
            /* blue-800 */
            border-right: 3px solid #4285F4;
        }

        .sidebar-link:hover:not(.active) {
            background-color: #f9fafb;
        }

        /* Status Badge Styles */
        .status-pending {
            background-color: #FEF3C7;
            color: #92400E;
        }

        /* Yellow */
        .status-approved {
            background-color: #DCFCE7;
            color: #166534;
        }

        /* Green */
        .status-rejected {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        /* Red */
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="flex items-center gap-2 font-bold text-xl text-gray-800">
                <i class="ph ph-student text-gsoc-blue text-2xl"></i>
                <span>Contributor<span class="text-gsoc-blue">Hub</span></span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <li>
                    <a href="#" class="sidebar-link active flex items-center px-6 py-3 text-sm font-medium">
                        <i class="ph ph-files text-lg mr-3"></i>
                        My Applications
                    </a>
                </li>
                <li>
                    <a href="projects.html"
                        class="sidebar-link flex items-center px-6 py-3 text-sm font-medium text-gray-600">
                        <i class="ph ph-magnifying-glass text-lg mr-3"></i>
                        Browse Projects
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link flex items-center px-6 py-3 text-sm font-medium text-gray-600">
                        <i class="ph ph-user text-lg mr-3"></i>
                        Profile Settings
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-gsoc-blue font-bold">
                    AS
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Alice Smith</p>
                    <p class="text-xs text-gray-500">B.Tech, 3rd Year</p>
                </div>
            </div>
            <a href="login.html"
                class="mt-4 block w-full text-center px-4 py-2 border border-gray-300 rounded-md text-xs font-medium text-gray-700 hover:bg-gray-50">
                Log Out
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Mobile Header -->
        <header class="md:hidden bg-white border-b border-gray-200 h-16 flex items-center justify-between px-4">
            <div class="font-bold text-lg text-gray-800">ContributorHub</div>
            <div class="flex items-center gap-4">
                <div
                    class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-gsoc-blue font-bold text-xs">
                    AS</div>
                <button class="text-gray-500 hover:text-gray-700">
                    <i class="ph ph-list text-2xl"></i>
                </button>
            </div>
        </header>

        <!-- Main Scrollable Area -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-8">

            <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">My Applications</h1>
                    <p class="text-sm text-gray-500">Track the status of your project proposals.</p>
                </div>

                <!-- Applications List -->
                <div class="space-y-6">

                    <!-- Application Card 1 (Approved) -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Distributed Cache System</h3>
                                    <p class="text-sm text-gray-500">Mentor: <span
                                            class="font-medium text-gray-700">John Doe</span></p>
                                </div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold status-approved">
                                    <i class="ph ph-check-circle mr-1.5 text-sm"></i> Approved
                                </span>
                            </div>

                            <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 mb-4">
                                <h4 class="text-sm font-bold text-blue-800 mb-1">Next Steps</h4>
                                <p class="text-xs text-blue-700">Congratulations! Please contact your mentor on the
                                    community Discord to begin the Community Bonding phase. Review the timeline for
                                    upcoming deadlines.</p>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 text-sm">
                                <span class="text-gray-500">Submitted on April 1, 2025</span>
                                <a href="#" class="text-gsoc-blue font-medium hover:underline flex items-center">
                                    View Proposal <i class="ph ph-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Application Card 2 (Pending) -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">AI Chatbot Interface</h3>
                                    <p class="text-sm text-gray-500">Mentor: <span
                                            class="font-medium text-gray-700">Sarah Jenkins</span></p>
                                </div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold status-pending">
                                    <i class="ph ph-clock mr-1.5 text-sm"></i> Pending Review
                                </span>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 text-sm">
                                <span class="text-gray-500">Submitted on March 28, 2025</span>
                                <div class="flex gap-4">
                                    <a href="#" class="text-gray-500 hover:text-gray-700 font-medium">Withdraw</a>
                                    <a href="#" class="text-gsoc-blue font-medium hover:underline flex items-center">
                                        View Proposal <i class="ph ph-arrow-right ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Application Card 3 (Rejected) -->
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden opacity-75">
                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Legacy Database Migration</h3>
                                    <p class="text-sm text-gray-500">Mentor: <span
                                            class="font-medium text-gray-700">Robert Chen</span></p>
                                </div>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold status-rejected">
                                    <i class="ph ph-x-circle mr-1.5 text-sm"></i> Not Selected
                                </span>
                            </div>

                            <p class="text-sm text-gray-600 mb-4">
                                Thank you for your interest. While your proposal was strong, we have selected another
                                candidate for this project. We encourage you to apply again next year!
                            </p>

                            <div class="flex items-center justify-between pt-4 border-t border-gray-100 text-sm">
                                <span class="text-gray-500">Submitted on March 25, 2025</span>
                                <a href="#" class="text-gsoc-blue font-medium hover:underline flex items-center">
                                    View Proposal <i class="ph ph-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

</body>

</html>