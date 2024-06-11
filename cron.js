const cron = require("node-cron");
const { exec } = require("child_process");

// Définissez une tâche cron qui s'exécute chaque minute
setInterval(() => {
    console.log("Running a task every 10 seconds");
    exec(
        "php artisan schedule:run",
        (error, stdout, stderr) => {
            if (error) {
                console.error(`Error: ${error.message}`);
                return;
            }
            if (stderr) {
                console.error(`Stderr: ${stderr}`);
                return;
            }
            console.log(`Stdout: ${stdout}`);
        }
    );
}, 10000); // 10000 ms = 10 seconds
