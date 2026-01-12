<?php
/* ===================================================================
   BACKEND SECTION (NO DATABASE REQUIRED)
   This script saves data to a local 'slugworks_data.json' file automatically.
   ===================================================================
*/

$dataFile = 'slugworks_data.json';

// 1. Initialize Data if file doesn't exist
if (!file_exists($dataFile)) {
    $initialData = [
        'projects' => [
            ['id' => 1, 'title' => 'Distributed Cache System', 'description' => 'Implementing a distributed caching mechanism using Go.', 'tags' => 'Go, Distributed Systems', 'status' => 'Published'],
            ['id' => 2, 'title' => 'GraphQL API Migration', 'description' => 'Migrating REST API to GraphQL.', 'tags' => 'Node.js, GraphQL', 'status' => 'Draft']
        ],
        'applications' => [
            ['id' => 101, 'project_title' => 'Distributed Cache System', 'name' => 'Alice Smith', 'initials' => 'AS', 'email' => 'alice@uni.edu', 'year' => '3rd Year', 'proposal_snippet' => 'I have experience with Go routines...', 'status' => 'pending'],
            ['id' => 102, 'project_title' => 'GraphQL API Migration', 'name' => 'Mike Kim', 'initials' => 'MK', 'email' => 'mike@tech.edu', 'year' => '2nd Year', 'proposal_snippet' => 'I am a Node.js enthusiast...', 'status' => 'pending']
        ]
    ];
    file_put_contents($dataFile, json_encode($initialData));
}

// 2. Handle API Requests
$action = $_GET['action'] ?? '';

if ($action) {
    header('Content-Type: application/json');
    $currentData = json_decode(file_get_contents($dataFile), true);

    if ($action === 'get_data') {
        echo json_encode($currentData);
        exit;
    }

    $input = json_decode(file_get_contents('php://input'), true);

    if ($action === 'add_project' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $newProject = [
            'id' => time(),
            'title' => $input['title'],
            'description' => $input['description'],
            'tags' => is_array($input['tags']) ? implode(', ', $input['tags']) : $input['tags'],
            'status' => 'Published'
        ];
        array_unshift($currentData['projects'], $newProject);
        file_put_contents($dataFile, json_encode($currentData));
        echo json_encode(['success' => true]);
        exit;
    }

    if ($action === 'update_app_status' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($currentData['applications'] as &$app) {
            if ($app['id'] == $input['id']) {
                $app['status'] = $input['status'];
                break;
            }
        }
        file_put_contents($dataFile, json_encode($currentData));
        echo json_encode(['success' => true]);
        exit;
    }

    if ($action === 'delete_project' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentData['projects'] = array_values(array_filter($currentData['projects'], function($p) use ($input) {
            return $p['id'] != $input['id'];
        }));
        file_put_contents($dataFile, json_encode($currentData));
        echo json_encode(['success' => true]);
        exit;
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        'brand-blue': '#4285F4',
                        'brand-green': '#34A853',
                        'brand-red': '#EA4335',
                        'bg-surface': '#F3F4F6',
                    }
                }
            }
        }
    </script>
    <style>
        .nav-item.active { background-color: #DEF7E5; color: #137333; }
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>

<body class="bg-bg-surface text-gray-800 h-screen flex overflow-hidden">

    <aside class="w-72 bg-white border-r border-gray-200 flex flex-col hidden md:flex z-20">
        
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <a href="javascript:history.back()" class="flex items-center group text-gray-600 hover:text-gray-900 transition-colors w-full">
                <div class="w-8 h-8 rounded-full bg-gray-50 border border-gray-200 group-hover:bg-gray-100 group-hover:border-gray-300 flex items-center justify-center mr-3 transition-all">
                    <i class="ph ph-arrow-left text-lg"></i>
                </div>
                <span class="font-semibold text-lg">Back</span>
            </a>
        </div>

        <nav class="flex-1 py-6 px-3 space-y-1 overflow-y-auto">
            <a href="#" onclick="switchTab('projects')" id="nav-projects" class="nav-item active flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-colors group">
                <i class="ph ph-kanban text-xl mr-3"></i> My Projects
            </a>
            <a href="#" onclick="switchTab('applications')" id="nav-applications" class="nav-item flex items-center px-4 py-3 text-sm font-medium text-gray-600 rounded-lg hover:bg-gray-50 transition-colors group">
                <i class="ph ph-users-three text-xl mr-3"></i> Applicants
                <span id="pending-badge" class="ml-auto bg-brand-red text-white text-xs font-bold px-2 py-0.5 rounded-full hidden">0</span>
            </a>
        </nav>
        
        <div class="p-4 border-t border-gray-100">
             <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 cursor-pointer">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-brand-blue font-bold">ME</div>
                <div><p class="text-sm font-medium">Mentor Account</p><p class="text-xs text-gray-500">mentor@slugworks.in</p></div>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <header class="md:hidden bg-white border-b h-16 flex items-center justify-between px-4">
            <button onclick="history.back()" class="flex items-center text-gray-700">
                <i class="ph ph-arrow-left text-xl mr-2"></i>
                <span class="font-bold text-lg">Back</span>
            </button>
            <button class="p-2"><i class="ph ph-list text-2xl"></i></button>
        </header>

        <main class="flex-1 overflow-y-auto p-4 md:p-8 relative scroll-smooth">
            
            <div id="view-projects" class="fade-in max-w-6xl mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <div><h1 class="text-3xl font-bold text-gray-900">Project Dashboard</h1><p class="text-gray-500 mt-1">Manage ideas & registrations.</p></div>
                    <button onclick="toggleModal('project-modal')" class="px-5 py-2.5 bg-brand-green text-white rounded-lg font-medium hover:bg-green-700 shadow-sm flex items-center"><i class="ph ph-plus-circle text-lg mr-2"></i> Post Project</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center">
                        <div class="p-3 rounded-full bg-blue-50 text-brand-blue mr-4"><i class="ph ph-rocket text-2xl"></i></div>
                        <div><p class="text-sm text-gray-500">Active Projects</p><p class="text-2xl font-bold" id="stat-projects">0</p></div>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center">
                        <div class="p-3 rounded-full bg-yellow-50 text-yellow-600 mr-4"><i class="ph ph-users text-2xl"></i></div>
                        <div><p class="text-sm text-gray-500">Total Applicants</p><p class="text-2xl font-bold" id="stat-applicants">0</p></div>
                    </div>
                    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center">
                        <div class="p-3 rounded-full bg-green-50 text-brand-green mr-4"><i class="ph ph-check-circle text-2xl"></i></div>
                        <div><p class="text-sm text-gray-500">Approved</p><p class="text-2xl font-bold" id="stat-approved">0</p></div>
                    </div>
                </div>

                <div id="projects-container" class="grid grid-cols-1 lg:grid-cols-2 gap-6"></div>
            </div>

            <div id="view-applications" class="hidden fade-in max-w-5xl mx-auto">
                <div id="back-button-container" class="hidden mb-6">
                    <button onclick="goBackToProjects()" class="flex items-center text-gray-500 hover:text-brand-blue font-medium transition-colors group">
                        <div class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center mr-3 shadow-sm group-hover:border-brand-blue group-hover:text-brand-blue"><i class="ph ph-arrow-left text-lg"></i></div>
                        Back to Projects
                    </button>
                </div>

                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900" id="app-view-title">Review Applications</h1>
                    <p class="text-gray-500 mt-1">Details of registered students.</p>
                </div>
                <div id="apps-container" class="space-y-4"></div>
            </div>
        </main>
    </div>

    <div id="project-modal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4 fade-in">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="font-bold text-lg">Create New Project</h3>
                <button onclick="toggleModal('project-modal')" class="text-gray-400 hover:text-gray-600"><i class="ph ph-x text-xl"></i></button>
            </div>
            <form onsubmit="addProject(event)" class="p-6 space-y-4">
                <div><label class="block text-sm font-medium mb-1">Title</label><input id="title" type="text" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-brand-green/20 outline-none"></div>
                <div><label class="block text-sm font-medium mb-1">Description</label><textarea id="description" rows="3" required class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-brand-green/20 outline-none"></textarea></div>
                <div><label class="block text-sm font-medium mb-1">Tags</label><input id="tags" type="text" placeholder="Python, AI" class="w-full px-4 py-2 rounded-lg border focus:ring-2 focus:ring-brand-green/20 outline-none"></div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" onclick="toggleModal('project-modal')" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg">Cancel</button>
                    <button type="submit" class="px-6 py-2 bg-brand-green text-white rounded-lg hover:bg-green-700">Publish</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // State
        let globalProjects = [];
        let globalApplications = [];
        let activeFilter = null;

        // Fetch Data from PHP
        async function loadData() {
            try {
                const res = await fetch('?action=get_data');
                const data = await res.json();
                
                globalProjects = data.projects;
                globalApplications = data.applications;
                
                updateStats();
                refreshUI();
            } catch (err) { console.error("Error:", err); }
        }

        function updateStats() {
            document.getElementById('stat-projects').innerText = globalProjects.length;
            document.getElementById('stat-applicants').innerText = globalApplications.length;
            document.getElementById('stat-approved').innerText = globalApplications.filter(a => a.status === 'approved').length;
        }

        function refreshUI() { renderProjects(); renderApplications(); }

        function renderProjects() {
            const container = document.getElementById('projects-container');
            container.innerHTML = '';
            globalProjects.forEach(proj => {
                const count = globalApplications.filter(app => app.project_title === proj.title).length;
                const tags = proj.tags ? proj.tags.split(',').map(t => `<span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-md border">${t}</span>`).join('') : '';
                
                container.innerHTML += `
                    <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-all flex flex-col h-full">
                        <div class="p-6 flex-grow">
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-0.5 rounded-full">${proj.status}</span>
                                <button onclick="deleteProject(${proj.id})" class="text-gray-300 hover:text-brand-red"><i class="ph ph-trash text-lg"></i></button>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">${proj.title}</h3>
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">${proj.description}</p>
                            <div class="flex flex-wrap gap-2">${tags}</div>
                        </div>
                        <div class="px-6 py-4 bg-gray-50 border-t rounded-b-xl flex justify-between items-center">
                            <div class="flex items-center text-gray-700"><i class="ph ph-users text-lg mr-2 text-brand-blue"></i><span class="font-bold mr-1">${count}</span> <span class="text-sm">Registered</span></div>
                            <button onclick="viewProjectApplicants('${proj.title}')" class="text-sm font-medium text-brand-blue hover:text-blue-700 flex items-center">View List <i class="ph ph-arrow-right ml-1"></i></button>
                        </div>
                    </div>`;
            });
        }

        function renderApplications() {
            const container = document.getElementById('apps-container');
            container.innerHTML = '';
            
            let displayApps = globalApplications;
            const titleEl = document.getElementById('app-view-title');
            const backBtn = document.getElementById('back-button-container');

            if (activeFilter) {
                displayApps = globalApplications.filter(app => app.project_title === activeFilter);
                titleEl.innerHTML = `Applicants for <span class="text-brand-blue">"${activeFilter}"</span>`;
                backBtn.classList.remove('hidden');
            } else {
                titleEl.textContent = "All Applications";
                backBtn.classList.add('hidden');
            }

            const pending = globalApplications.filter(a => a.status === 'pending').length;
            document.getElementById('pending-badge').innerText = pending;
            document.getElementById('pending-badge').style.display = pending > 0 ? 'inline-block' : 'none';

            if (displayApps.length === 0) {
                container.innerHTML = `<div class="text-center py-16 bg-white rounded-xl border border-dashed text-gray-400">No applicants found.</div>`;
                return;
            }

            displayApps.forEach(app => {
                const initials = app.initials || app.name.slice(0,2).toUpperCase();
                let statusBadge = app.status === 'pending' ? `<span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">Pending</span>` : 
                                  app.status === 'approved' ? `<span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Approved</span>` : 
                                  `<span class="bg-red-100 text-red-800 text-xs font-bold px-3 py-1 rounded-full">Rejected</span>`;

                let actions = app.status === 'pending' ? `
                    <div class="flex gap-3 pt-3 border-t mt-3">
                        <button onclick="updateStatus(${app.id}, 'approved')" class="flex-1 py-2 bg-brand-green text-white text-sm rounded-lg hover:bg-green-700">Approve</button>
                        <button onclick="updateStatus(${app.id}, 'rejected')" class="flex-1 py-2 border text-gray-700 text-sm rounded-lg hover:bg-gray-50">Reject</button>
                    </div>` : '';

                container.innerHTML += `
                    <div class="bg-white rounded-xl border border-gray-200 p-6 shadow-sm flex flex-col md:flex-row gap-6">
                        <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xl border border-indigo-100 shrink-0">${initials}</div>
                        <div class="flex-grow">
                            <div class="flex justify-between mb-2">
                                <div><h3 class="text-lg font-bold">${app.name}</h3><div class="text-sm text-gray-500">For: <b>${app.project_title}</b></div></div>
                                <div>${statusBadge}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-3 grid grid-cols-2 gap-4 mb-3 text-sm text-gray-600">
                                <div class="flex items-center"><i class="ph ph-envelope-simple mr-2"></i> ${app.email}</div>
                                <div class="flex items-center"><i class="ph ph-student mr-2"></i> ${app.year}</div>
                            </div>
                            <div class="text-sm text-gray-600 italic p-3 border rounded mb-2">"${app.proposal_snippet}"</div>
                            ${actions}
                        </div>
                    </div>`;
            });
        }

        // Interaction Logic
        function viewProjectApplicants(title) { activeFilter = title; switchTab('applications'); refreshUI(); document.querySelector('main').scrollTop = 0; }
        function goBackToProjects() { activeFilter = null; refreshUI(); switchTab('projects'); }
        
        function switchTab(tab) {
            document.getElementById('view-projects').classList.add('hidden');
            document.getElementById('view-applications').classList.add('hidden');
            document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
            document.getElementById('nav-'+tab).classList.add('active');
            document.getElementById('view-'+tab).classList.remove('hidden');
        }

        async function addProject(e) {
            e.preventDefault();
            await fetch('?action=add_project', { method: 'POST', body: JSON.stringify({ 
                title: document.getElementById('title').value, 
                description: document.getElementById('description').value, 
                tags: document.getElementById('tags').value.split(',').map(t => t.trim()) 
            })});
            toggleModal('project-modal'); e.target.reset(); loadData();
        }

        async function updateStatus(id, status) {
            await fetch('?action=update_app_status', { method: 'POST', body: JSON.stringify({ id, status }) });
            loadData();
        }

        async function deleteProject(id) {
            if(!confirm("Delete project?")) return;
            await fetch('?action=delete_project', { method: 'POST', body: JSON.stringify({ id }) });
            loadData();
        }

        function toggleModal(id) { document.getElementById(id).classList.toggle('hidden'); }

        // Start
        loadData();
    </script>
</body>
</html>