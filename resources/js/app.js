import './bootstrap';

console.log("start app");
Echo.channel('module-status')
    .listen('ModuleStatusUpdated', (e) => {
        console.log('Module status updated:', e.module, 'Status:', e.status);
        // Logique pour afficher une notification à l'utilisateur
        alert(`Module ${e.module.name} status updated: ${e.status}`);
    });
