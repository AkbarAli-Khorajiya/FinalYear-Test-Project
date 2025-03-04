<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Progress Panel</title>
    <style type="text/css">
        <?php 
            include 'css/progress.css'; 
        ?>
    </style>
    <script>
        <?php include_once 'js/jquery-3.7.1.min.js';?>
    </script>
</head>
<body>
    <?php include_once 'include/loader.php';?>
    <?php include_once 'include/header.php'; ?>
    <div class="min-h-screen p-4 md:p-8"> 
        <main class="grid gap-6 md:grid-cols-2">
            <!-- Overall Progress Card -->
            <div class="card  col-span-full">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        John Doe
                    </h2>
                    <div class="card-description">Average Score Percentage</div>
                </div>
                <div class="card-content">
                    <div class="progress-container">
                        <div class="progress-bar" style="width: 85%"></div>
                    </div>
                    <p class="mt-2 text-sm text-gray-600">85.0% Average Score</p>
                </div>
            </div>

            <!-- Completed Tests Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        Completed Tests
                    </h2>
                </div>
                <div class="card-content">
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Mathematics 101</p>
                                <p class="text-sm text-gray-500">2025-02-10</p>
                            </div>
                            <span class="badge">85%</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">English Literature</p>
                                <p class="text-sm text-gray-500">2025-02-12</p>
                            </div>
                            <span class="badge">92%</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Physics Fundamentals</p>
                                <p class="text-sm text-gray-500">2025-02-15</p>
                            </div>
                            <span class="badge secondary">78%</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Teacher Feedback Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        Teacher Feedback
                    </h2>
                </div>
                <div class="card-content">
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-4">
                            <div class="avatar">
                                <div class="avatar-fallback">DS</div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium leading-none">Dr. Smith</p>
                                <p class="text-sm text-muted">Mathematics</p>
                                <p class="text-sm text-gray-600">Excellent progress in algebra. Work on geometry concepts.</p>
                                <p class="text-xs text-gray-500">2025-02-18</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="avatar">
                                <div class="avatar-fallback">MJ</div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium leading-none">Ms. Johnson</p>
                                <p class="text-sm text-muted">English</p>
                                <p class="text-sm text-gray-600">Great essay structure. Focus on expanding vocabulary.</p>
                                <p class="text-xs text-gray-500">2025-02-16</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="avatar">
                                <div class="avatar-fallback">MB</div>
                            </div>
                            <div class="space-y-1">
                                <p class="text-sm font-medium leading-none">Mr. Brown</p>
                                <p class="text-sm text-muted">Physics</p>
                                <p class="text-sm text-gray-600">Good understanding of mechanics. Review thermodynamics.</p>
                                <p class="text-xs text-gray-500">2025-02-14</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
