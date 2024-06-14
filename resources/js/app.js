import "./bootstrap"; // Importing bootstrap dependencies



// Subscribe to the 'module-status' channel to listen for the 'ModuleStatusUpdated' event
Echo.channel("module-status").listen("ModuleStatusUpdated", (e) => {
    const { module, status, data_collected } = e;
    const { displayNotification, updateModuleStatus, refreshTable } = window;
    data_collected.module = module;

    window.data_collecteds.unshift(data_collected);

    displayNotification(); // Display a notification
    updateModuleStatus(module, status); // Update the module status in the interface
    if (module.slug == localStorage.currentModuleSlug) {
        refreshTable(module, data_collected); // Refresh the modules table
    }
});
