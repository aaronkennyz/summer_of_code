<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard - Slugworks SOE Summer of Code</title>

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
            background-color: #f0fdf4;
            /* green-50 */
            color: #166534;
            /* green-800 */
            border-right: 3px solid #34A853;
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
                <i class="ph ph-code text-gsoc-green text-2xl"></i>
                <span>Mentor<span class="text-gsoc-green">Hub</span></span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <li>
                    <a href="#" onclick="switchTab('projects')" id="nav-projects"
                        class="sidebar-link active flex items-center px-6 py-3 text-sm font-medium">
                        <i class="ph ph-kanban text-lg mr-3"></i>
                        My Projects
                    </a>
                </li>
                <li>
                    <a href="#" onclick="switchTab('applications')" id="nav-applications"
                        class="sidebar-link flex items-center px-6 py-3 text-sm font-medium text-gray-600">
                        <i class="ph ph-users-three text-lg mr-3"></i>
                        Review Applications
                        <span class="ml-auto bg-gsoc-red text-white py-0.5 px-2 rounded-full text-xs"
                            id="pending-count">3</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-gsoc-green font-bold">
                    JD
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">John Doe</p>
                    <p class="text-xs text-gray-500">Senior Mentor</p>
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
            <div class="font-bold text-lg text-gray-800">MentorHub</div>
            <button class="text-gray-500 hover:text-gray-700">
                <i class="ph ph-list text-2xl"></i>
            </button>
        </header>

        <!-- Main Scrollable Area -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-8">

            <!-- PROJECTS SECTION -->
            <div id="view-projects" class="max-w-5xl mx-auto">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">My Projects</h1>
                        <p class="text-sm text-gray-500">Manage your project ideas and listings.</p>
                    </div>
                    <button onclick="toggleModal('project-modal')"
                        class="flex items-center px-4 py-2 bg-gsoc-green text-white rounded-lg hover:bg-green-600 transition shadow-sm text-sm font-medium">
                        <i class="ph ph-plus mr-2"></i> Post New Project
                    </button>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6" id="projects-container">

                    <!-- Project Card 1 -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Published
                            </span>
                            <div class="flex gap-2">
                                <button class="text-gray-400 hover:text-gsoc-blue"><i
                                        class="ph ph-pencil-simple"></i></button>
                                <button class="text-gray-400 hover:text-gsoc-red"><i class="ph ph-trash"></i></button>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Distributed Cache System</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">
                            Implementing a distributed caching mechanism using Go to improve microservice latency. This
                            project focuses on high availability and fault tolerance across distributed nodes.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">Go</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">Distributed Systems</span>
                        </div>
                    </div>

                    <!-- Project Card 2 -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Draft
                            </span>
                            <div class="flex gap-2">
                                <button class="text-gray-400 hover:text-gsoc-blue"><i
                                        class="ph ph-pencil-simple"></i></button>
                                <button class="text-gray-400 hover:text-gsoc-red"><i class="ph ph-trash"></i></button>
                            </div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">GraphQL API Migration</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-3">
                            Migrating our existing REST API to GraphQL to reduce over-fetching and improve frontend
                            performance. Requires schema design and resolver implementation.
                        </p>
                        <div class="flex flex-wrap gap-2 mt-auto">
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">Node.js</span>
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">GraphQL</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- APPLICATIONS SECTION (Hidden by default) -->
            <div id="view-applications" class="max-w-5xl mx-auto hidden">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Review Applications</h1>
                    <p class="text-sm text-gray-500">Approve or reject student proposals for your projects.</p>
                </div>

                <div class="space-y-4">

                    <!-- Application Card 1 (Pending) -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm flex flex-col md:flex-row gap-6"
                        id="app-card-1">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-gsoc-blue font-bold text-lg">
                                AS
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">Alice Smith</h3>
                                    <p class="text-sm text-gray-500">Applied for: <span
                                            class="font-medium text-gray-700">Distributed Cache System</span></p>
                                </div>
                                <span
                                    class="status-badge px-3 py-1 rounded-full text-xs font-bold status-pending mt-2 sm:mt-0 w-fit">
                                    Pending Review
                                </span>
                            </div>

                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 mb-4">
                                <p class="text-sm text-gray-600 italic">"I have experience with Go routines and have
                                    previously built a simple LRU cache. I propose to use consistent hashing for..."</p>
                                <a href="#"
                                    class="text-xs text-gsoc-blue font-medium hover:underline mt-1 inline-block">View
                                    Full Proposal PDF</a>
                            </div>

                            <div class="flex flex-wrap gap-4 text-xs text-gray-500 mb-4">
                                <span class="flex items-center"><i class="ph ph-student mr-1"></i> 3rd Year,
                                    B.Tech</span>
                                <span class="flex items-center"><i class="ph ph-envelope mr-1"></i>
                                    alice@university.edu</span>
                            </div>

                            <div class="action-buttons flex gap-3">
                                <button onclick="updateStatus('app-card-1', 'approved')"
                                    class="flex-1 sm:flex-none px-4 py-2 bg-gsoc-green text-white text-sm font-medium rounded hover:bg-green-600 transition">
                                    Approve
                                </button>
                                <button onclick="updateStatus('app-card-1', 'rejected')"
                                    class="flex-1 sm:flex-none px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition">
                                    Reject
                                </button>
                            </div>
                            <div class="undo-action hidden mt-2">
                                <button onclick="resetStatus('app-card-1')"
                                    class="text-xs text-gsoc-blue hover:underline flex items-center">
                                    <i class="ph ph-arrow-u-up-left mr-1"></i> Change Decision
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Application Card 2 (Pending) -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm flex flex-col md:flex-row gap-6"
                        id="app-card-2">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold text-lg">
                                MK
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">Mike Kim</h3>
                                    <p class="text-sm text-gray-500">Applied for: <span
                                            class="font-medium text-gray-700">GraphQL API Migration</span></p>
                                </div>
                                <span
                                    class="status-badge px-3 py-1 rounded-full text-xs font-bold status-pending mt-2 sm:mt-0 w-fit">
                                    Pending Review
                                </span>
                            </div>

                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 mb-4">
                                <p class="text-sm text-gray-600 italic">"I'm a Node.js enthusiast. My plan involves
                                    using Apollo Server and creating a middleware layer to wrap the existing..."</p>
                                <a href="#"
                                    class="text-xs text-gsoc-blue font-medium hover:underline mt-1 inline-block">View
                                    Full Proposal PDF</a>
                            </div>

                            <div class="flex flex-wrap gap-4 text-xs text-gray-500 mb-4">
                                <span class="flex items-center"><i class="ph ph-student mr-1"></i> 2nd Year, M.Sc</span>
                                <span class="flex items-center"><i class="ph ph-envelope mr-1"></i> mike@tech.edu</span>
                            </div>

                            <div class="action-buttons flex gap-3">
                                <button onclick="updateStatus('app-card-2', 'approved')"
                                    class="flex-1 sm:flex-none px-4 py-2 bg-gsoc-green text-white text-sm font-medium rounded hover:bg-green-600 transition">
                                    Approve
                                </button>
                                <button onclick="updateStatus('app-card-2', 'rejected')"
                                    class="flex-1 sm:flex-none px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition">
                                    Reject
                                </button>
                            </div>
                            <div class="undo-action hidden mt-2">
                                <button onclick="resetStatus('app-card-2')"
                                    class="text-xs text-gsoc-blue hover:underline flex items-center">
                                    <i class="ph ph-arrow-u-up-left mr-1"></i> Change Decision
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Application Card 3 (Previously Rejected Example with Undo option) -->
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm flex flex-col md:flex-row gap-6"
                        id="app-card-3">
                        <div class="flex-shrink-0">
                            <div
                                class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold text-lg">
                                RJ
                            </div>
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900">Raj Patel</h3>
                                    <p class="text-sm text-gray-500">Applied for: <span
                                            class="font-medium text-gray-700">Distributed Cache System</span></p>
                                </div>
                                <span
                                    class="status-badge px-3 py-1 rounded-full text-xs font-bold status-rejected mt-2 sm:mt-0 w-fit">
                                    Rejected
                                </span>
                            </div>

                            <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 mb-4">
                                <p class="text-sm text-gray-600 italic">"I want to learn Go. I don't have much
                                    experience but I am a quick learner..."</p>
                            </div>

                            <div class="flex flex-wrap gap-4 text-xs text-gray-500 mb-4">
                                <span class="flex items-center"><i class="ph ph-student mr-1"></i> 1st Year,
                                    B.Tech</span>
                            </div>

                            <div class="action-buttons hidden flex gap-3">
                                <button onclick="updateStatus('app-card-3', 'approved')"
                                    class="flex-1 sm:flex-none px-4 py-2 bg-gsoc-green text-white text-sm font-medium rounded hover:bg-green-600 transition">
                                    Approve
                                </button>
                                <button onclick="updateStatus('app-card-3', 'rejected')"
                                    class="flex-1 sm:flex-none px-4 py-2 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition">
                                    Reject
                                </button>
                            </div>
                            <div class="undo-action mt-2">
                                <button onclick="resetStatus('app-card-3')"
                                    class="text-xs text-gsoc-blue hover:underline flex items-center">
                                    <i class="ph ph-arrow-u-up-left mr-1"></i> Change Decision
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- Post Project Modal -->
    <div id="project-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Post New Project</h3>
                <button onclick="toggleModal('project-modal')" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-xl"></i>
                </button>
            </div>
            <form id="new-project-form" onsubmit="addProject(event)">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Project Title</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-green"
                        id="title" type="text" placeholder="e.g. AI Chatbot" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-green"
                        id="description" rows="4" placeholder="Describe the project goals..." required></textarea>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tags">Tech Stack (comma
                        separated)</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-green"
                        id="tags" type="text" placeholder="Python, React, AWS">
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" onclick="toggleModal('project-modal')"
                        class="mr-3 px-4 py-2 text-gray-500 hover:text-gray-700 text-sm font-medium">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-gsoc-green text-white rounded hover:bg-green-600 text-sm font-medium shadow">Publish
                        Project</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // --- Tab Switching Logic ---
        function switchTab(tabName) {
            // Hide all views
            document.getElementById('view-projects').classList.add('hidden');
            document.getElementById('view-applications').classList.add('hidden');

            // Remove active class from nav
            document.getElementById('nav-projects').classList.remove('active', 'text-green-800', 'bg-green-50', 'border-r-4', 'border-gsoc-green');
            document.getElementById('nav-applications').classList.remove('active', 'text-green-800', 'bg-green-50', 'border-r-4', 'border-gsoc-green');

            // Show selected view
            document.getElementById('view-' + tabName).classList.remove('hidden');

            // Add active class to nav
            const activeNav = document.getElementById('nav-' + tabName);
            activeNav.classList.add('active');
        }

        // --- Approve/Reject/Reset Logic ---
        function updateStatus(cardId, status) {
            const card = document.getElementById(cardId);
            const badge = card.querySelector('.status-badge');
            const buttons = card.querySelector('.action-buttons');
            const undo = card.querySelector('.undo-action');

            // If it was pending, decrease pending count
            if (badge.textContent.trim() === 'Pending Review') {
                updatePendingCount(-1);
            }

            // Update visual badge
            if (status === 'approved') {
                badge.className = 'status-badge px-3 py-1 rounded-full text-xs font-bold status-approved mt-2 sm:mt-0 w-fit';
                badge.textContent = 'Approved';
            } else if (status === 'rejected') {
                badge.className = 'status-badge px-3 py-1 rounded-full text-xs font-bold status-rejected mt-2 sm:mt-0 w-fit';
                badge.textContent = 'Rejected';
            }

            // Hide action buttons, show undo
            buttons.classList.add('hidden');
            buttons.classList.remove('flex'); // remove flex to hide completely
            undo.classList.remove('hidden');
        }

        function resetStatus(cardId) {
            const card = document.getElementById(cardId);
            const badge = card.querySelector('.status-badge');
            const buttons = card.querySelector('.action-buttons');
            const undo = card.querySelector('.undo-action');

            // Reset Badge
            badge.className = 'status-badge px-3 py-1 rounded-full text-xs font-bold status-pending mt-2 sm:mt-0 w-fit';
            badge.textContent = 'Pending Review';

            // Show action buttons, hide undo
            buttons.classList.remove('hidden');
            buttons.classList.add('flex'); // add flex back
            undo.classList.add('hidden');

            // Increase pending count
            updatePendingCount(1);
        }

        function updatePendingCount(change) {
            const counter = document.getElementById('pending-count');
            let current = parseInt(counter.textContent) || 0;
            let newCount = current + change;
            counter.textContent = newCount;

            if (newCount <= 0) {
                counter.style.display = 'none';
            } else {
                counter.style.display = 'inline-block';
            }
        }

        // --- Modal Logic ---
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
        }

        // --- Add Project Logic (Simulation) ---
        function addProject(e) {
            e.preventDefault();
            const title = document.getElementById('title').value;
            const desc = document.getElementById('description').value;
            const tags = document.getElementById('tags').value.split(',').map(tag => tag.trim());

            const container = document.getElementById('projects-container');

            // Create new card HTML
            const newCard = document.createElement('div');
            newCard.className = 'bg-white rounded-xl border border-gray-200 p-6 shadow-sm hover:shadow-md transition';

            let tagsHtml = '';
            tags.forEach(tag => {
                if (tag) tagsHtml += `<span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs">${tag}</span> `;
            });

            newCard.innerHTML = `
                <div class="flex justify-between items-start mb-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Published
                    </span>
                    <div class="flex gap-2">
                        <button class="text-gray-400 hover:text-gsoc-blue"><i class="ph ph-pencil-simple"></i></button>
                        <button class="text-gray-400 hover:text-gsoc-red"><i class="ph ph-trash"></i></button>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">${title}</h3>
                <p class="text-gray-500 text-sm mb-4 line-clamp-3">${desc}</p>
                <div class="flex flex-wrap gap-2 mt-auto">
                    ${tagsHtml}
                </div>
            `;

            // Add to grid
            container.insertBefore(newCard, container.firstChild);

            // Close modal & reset form
            toggleModal('project-modal');
            document.getElementById('new-project-form').reset();
        }
    </script>
</body>

</html>