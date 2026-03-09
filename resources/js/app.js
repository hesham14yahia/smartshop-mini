import './bootstrap';
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

window.Alpine = Alpine

document.addEventListener('livewire:init', () => {
    Alpine.start()
})
