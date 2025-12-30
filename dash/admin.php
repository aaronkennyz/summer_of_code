<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Slugworks SOE Summer of Code</title>

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
            background-color: #fef2f2;
            /* red-50 */
            color: #991b1b;
            /* red-800 */
            border-right: 3px solid #EA4335;
        }

        .sidebar-link:hover:not(.active) {
            background-color: #f9fafb;
        }

        /* Delisted Project Styling */
        .project-card.delisted {
            opacity: 0.7;
            background-color: #f3f4f6;
            border-style: dashed;
        }

        .project-card.delisted .status-badge {
            background-color: #FEE2E2;
            color: #991B1B;
        }
    </style>
</head>

<body class="font-sans text-gray-700 bg-gsoc-bg flex h-screen overflow-hidden">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 hidden md:flex flex-col">
        <div class="h-16 flex items-center px-6 border-b border-gray-200">
            <div class="flex items-center gap-2 font-bold text-xl text-gray-800">
                <i class="ph ph-shield-check text-gsoc-red text-2xl"></i>
                <span>Admin<span class="text-gsoc-red">Panel</span></span>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4">
            <ul class="space-y-1">
                <li>
                    <a href="#" onclick="switchTab('overview')" id="nav-overview"
                        class="sidebar-link active flex items-center px-6 py-3 text-sm font-medium">
                        <i class="ph ph-squares-four text-lg mr-3"></i>
                        Overview
                    </a>
                </li>
                <li>
                    <a href="#" onclick="switchTab('users')" id="nav-users"
                        class="sidebar-link flex items-center px-6 py-3 text-sm font-medium text-gray-600">
                        <i class="ph ph-users text-lg mr-3"></i>
                        Manage Users
                    </a>
                </li>
                <li>
                    <a href="#" onclick="switchTab('projects')" id="nav-projects"
                        class="sidebar-link flex items-center px-6 py-3 text-sm font-medium text-gray-600">
                        <i class="ph ph-kanban text-lg mr-3"></i>
                        Manage Projects
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-gsoc-red font-bold">
                    AD
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">System Admin</p>
                    <p class="text-xs text-gray-500">Super User</p>
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
            <div class="font-bold text-lg text-gray-800">AdminPanel</div>
            <button class="text-gray-500 hover:text-gray-700">
                <i class="ph ph-list text-2xl"></i>
            </button>
        </header>

        <!-- Main Scrollable Area -->
        <main class="flex-1 overflow-y-auto p-4 sm:p-8">

            <!-- OVERVIEW SECTION -->
            <div id="view-overview" class="max-w-6xl mx-auto">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Program Overview</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Students</p>
                                <p class="text-2xl font-bold text-gray-900">1,248</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-gsoc-blue">
                                <i class="ph ph-student text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Active Mentors</p>
                                <p class="text-2xl font-bold text-gray-900">86</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-gsoc-green">
                                <i class="ph ph-chalkboard-teacher text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Active Projects</p>
                                <p class="text-2xl font-bold text-gray-900">42</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-gsoc-yellow">
                                <i class="ph ph-kanban text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                    <h2 class="text-lg font-bold text-gray-900 mb-4">Recent Activity</h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 py-2 border-b border-gray-100 last:border-0">
                            <div
                                class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-gsoc-green">
                                <i class="ph ph-plus"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">New project "AI Chatbot" posted</p>
                                <p class="text-xs text-gray-500">By Mentor Sarah Jenkins • 2 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 py-2 border-b border-gray-100 last:border-0">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-gsoc-blue">
                                <i class="ph ph-user-plus"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">New student registration</p>
                                <p class="text-xs text-gray-500">Alice Smith (B.Tech) • 5 hours ago</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 py-2 border-b border-gray-100 last:border-0">
                            <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-gsoc-red">
                                <i class="ph ph-warning-circle"></i></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">Project "Legacy DB" delisted</p>
                                <p class="text-xs text-gray-500">By Admin • 1 day ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MANAGE USERS SECTION -->
            <div id="view-users" class="max-w-6xl mx-auto hidden">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Manage Users</h1>
                        <p class="text-sm text-gray-500">Create mentors and delete user profiles.</p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="toggleModal('add-mentor-modal')"
                            class="flex items-center px-4 py-2 bg-gsoc-red text-white rounded-lg hover:bg-red-700 transition shadow-sm text-sm font-medium">
                            <i class="ph ph-user-plus mr-2"></i> Add Mentor
                        </button>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="border-b border-gray-200 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button onclick="switchUserTab('mentors')" id="tab-mentors"
                            class="border-gsoc-red text-gsoc-red whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Mentors
                        </button>
                        <button onclick="switchUserTab('students')" id="tab-students"
                            class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                            Students
                        </button>
                    </nav>
                </div>

                <!-- Mentors Table -->
                <div id="users-mentors" class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="mentor-list">
                            <!-- Mentor Row 1 -->
                            <tr id="mentor-1">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-gsoc-green font-bold text-xs">
                                            JD</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">john.doe@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="deleteRow('mentor-1')"
                                        class="text-red-600 hover:text-red-900">Delete Profile</button>
                                </td>
                            </tr>
                            <!-- Mentor Row 2 -->
                            <tr id="mentor-2">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-gsoc-green font-bold text-xs">
                                            SJ</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Sarah Jenkins</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">sarah.j@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="deleteRow('mentor-2')"
                                        class="text-red-600 hover:text-red-900">Delete Profile</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Students Table (Hidden by default) -->
                <div id="users-students"
                    class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Details</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Joined</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="student-list">
                            <tr id="student-1">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center text-gsoc-blue font-bold text-xs">
                                            AS</div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Alice Smith</div>
                                            <div class="text-xs text-gray-500">alice@university.edu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">B.Tech (3rd Year)</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jan 12, 2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button onclick="deleteRow('student-1')"
                                        class="text-red-600 hover:text-red-900">Delete Profile</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- MANAGE PROJECTS SECTION -->
            <div id="view-projects" class="max-w-6xl mx-auto hidden">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Projects</h1>
                    <p class="text-sm text-gray-500">Delist inappropriate projects or relist valid ones.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="projects-grid">

                    <!-- Project Card 1 (Active) -->
                    <div class="project-card bg-white rounded-xl border border-gray-200 p-6 shadow-sm relative transition-all"
                        id="proj-1">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Published</span>
                            <div class="text-xs text-gray-500">ID: #P-101</div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Distributed Cache System</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Implementing a distributed caching mechanism
                            using Go...</p>
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-500">By John Doe</span>
                            <button onclick="toggleProjectStatus('proj-1')"
                                class="action-btn text-xs text-red-600 font-bold hover:underline border border-red-200 px-3 py-1 rounded bg-red-50 hover:bg-red-100">
                                Delist Project
                            </button>
                        </div>
                    </div>

                    <!-- Project Card 2 (Delisted Example) -->
                    <div class="project-card delisted bg-white rounded-xl border border-gray-200 p-6 shadow-sm relative transition-all"
                        id="proj-2">
                        <div class="flex justify-between items-start mb-4">
                            <span
                                class="status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Delisted</span>
                            <div class="text-xs text-gray-500">ID: #P-102</div>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Legacy DB Migration</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Migrating old SQL data to Mongo. Project put
                            on hold...</p>
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-500">By Sarah J</span>
                            <button onclick="toggleProjectStatus('proj-2')"
                                class="action-btn text-xs text-green-600 font-bold hover:underline border border-green-200 px-3 py-1 rounded bg-green-50 hover:bg-green-100">
                                Relist Project
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- Add Mentor Modal -->
    <div id="add-mentor-modal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Create Mentor Profile</h3>
                <button onclick="toggleModal('add-mentor-modal')" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-xl"></i>
                </button>
            </div>
            <form id="add-mentor-form" onsubmit="addMentor(event)">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="m-name">Full Name</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-red"
                        id="m-name" type="text" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="m-email">Email Address</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-red"
                        id="m-email" type="email" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="m-password">Temporary
                        Password</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-gsoc-red"
                        id="m-password" type="password" required>
                </div>
                <div class="flex items-center justify-end">
                    <button type="button" onclick="toggleModal('add-mentor-modal')"
                        class="mr-3 px-4 py-2 text-gray-500 hover:text-gray-700 text-sm font-medium">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-gsoc-red text-white rounded hover:bg-red-700 text-sm font-medium shadow">Create
                        Mentor</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // --- Main Navigation Tab Switching ---
        function switchTab(tabName) {
            // Hide all views
            ['overview', 'users', 'projects'].forEach(view => {
                document.getElementById('view-' + view).classList.add('hidden');
                document.getElementById('nav-' + view).classList.remove('active', 'text-red-800', 'bg-red-50', 'border-r-4', 'border-gsoc-red');
            });

            // Show selected view
            document.getElementById('view-' + tabName).classList.remove('hidden');

            // Add active class to nav
            const activeNav = document.getElementById('nav-' + tabName);
            activeNav.classList.add('active');
        }

        // --- User Management Tab Switching ---
        function switchUserTab(userType) {
            // Hide both tables
            document.getElementById('users-mentors').classList.add('hidden');
            document.getElementById('users-students').classList.add('hidden');

            // Reset tab styles
            document.getElementById('tab-mentors').classList.remove('border-gsoc-red', 'text-gsoc-red');
            document.getElementById('tab-mentors').classList.add('border-transparent', 'text-gray-500');
            document.getElementById('tab-students').classList.remove('border-gsoc-red', 'text-gsoc-red');
            document.getElementById('tab-students').classList.add('border-transparent', 'text-gray-500');

            // Show target table and style tab
            document.getElementById('users-' + userType).classList.remove('hidden');
            const activeTab = document.getElementById('tab-' + userType);
            activeTab.classList.remove('border-transparent', 'text-gray-500');
            activeTab.classList.add('border-gsoc-red', 'text-gsoc-red');
        }

        // --- User Deletion ---
        function deleteRow(rowId) {
            if (confirm("Are you sure you want to delete this user profile? This action cannot be undone.")) {
                const row = document.getElementById(rowId);
                row.style.opacity = '0';
                setTimeout(() => row.remove(), 300);
            }
        }

        // --- Add Mentor Logic ---
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
        }

        function addMentor(e) {
            e.preventDefault();
            const name = document.getElementById('m-name').value;
            const email = document.getElementById('m-email').value;
            const initials = name.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);

            const tbody = document.getElementById('mentor-list');
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="h-8 w-8 rounded-full bg-green-100 flex items-center justify-center text-gsoc-green font-bold text-xs">${initials}</div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">${name}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${email}</td>
                <td class="px-6 py-4 whitespace-nowrap"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span></td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button onclick="deleteRow(this.closest('tr').id)" class="text-red-600 hover:text-red-900">Delete Profile</button>
                </td>
            `;

            // Generate a random ID for deletion logic
            newRow.id = 'mentor-' + Math.random().toString(36).substr(2, 9);

            tbody.insertBefore(newRow, tbody.firstChild);
            toggleModal('add-mentor-modal');
            document.getElementById('add-mentor-form').reset();
        }

        // --- Project Delist/Relist Logic ---
        function toggleProjectStatus(cardId) {
            const card = document.getElementById(cardId);
            const badge = card.querySelector('.status-badge');
            const btn = card.querySelector('.action-btn');

            if (card.classList.contains('delisted')) {
                // RELIST ACTION
                card.classList.remove('delisted');
                badge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800';
                badge.textContent = 'Published';

                btn.className = 'action-btn text-xs text-red-600 font-bold hover:underline border border-red-200 px-3 py-1 rounded bg-red-50 hover:bg-red-100';
                btn.textContent = 'Delist Project';
            } else {
                // DELIST ACTION
                card.classList.add('delisted');
                badge.className = 'status-badge inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800';
                badge.textContent = 'Delisted';

                btn.className = 'action-btn text-xs text-green-600 font-bold hover:underline border border-green-200 px-3 py-1 rounded bg-green-50 hover:bg-green-100';
                btn.textContent = 'Relist Project';
            }
        }
    </script>
</body>

</html>