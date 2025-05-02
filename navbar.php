<?php


// Check if the user is logged in
$is_logged_in = isset($_SESSION['user_id']);
?>

<nav class="bg-teal-500 shadow-md">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 text-white font-bold text-xl">
                    My PHP Site
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="index.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">Home</a>
                        <a href="view-users.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">View Users</a>
                        <?php if ($is_logged_in): ?>
                            <a href="homepage.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">Dashboard</a>
                            <a href="logout.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">Logout</a>
                        <?php else: ?>
                            <a href="login.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">Login</a>
                            <a href="signup.php" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-teal-600">Sign Up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="index.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">Home</a>
        <a href="view-users.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">View Users</a>
        <?php if ($is_logged_in): ?>
            <a href="homepage.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">Dashboard</a>
            <a href="logout.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">Logout</a>
        <?php else: ?>
            <a href="login.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">Login</a>
            <a href="signup.php" class="text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-teal-600">Sign Up</a>
        <?php endif; ?>
    </div>
</div>

        </div>
    </div>
</nav>
