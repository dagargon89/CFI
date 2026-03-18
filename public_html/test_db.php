<?php
$hash = '$2y$12$VkF1GabrY1UUTo8m9VjASOVPXQChyrDUkLNE5o2YFKWqtG9umkTCK';
$password = 'Dataholics2026';
echo "MATCH: " . (password_verify($password, $hash) ? 'YES' : 'NO') . "\n";
