import { exec } from 'child_process';

const runCommand = (command, name) => {
  const process = exec(command);

  process.stdout.on('data', data => {
    console.log(`[${name}] ${data}`);
  });

  process.stderr.on('data', data => {
    console.error(`[${name}] ${data}`);
  });

  process.on('exit', code => {
    console.log(`[${name}] exited with code ${code}`);
  });
};

runCommand('npm run vite', 'Vite');
runCommand('php artisan serve', 'Laravel');
