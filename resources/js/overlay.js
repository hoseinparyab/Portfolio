document.addEventListener('DOMContentLoaded', () => {
        const searchLink = document.querySelector('a.search');
        const overlay = document.getElementById('search-overlay');
        const input = document.getElementById('search-input');

        function openOverlay() {
          overlay.classList.remove('hidden');
          document.body.style.overflow = 'hidden';
          input.focus();
        }

        function closeOverlay() {
          overlay.classList.add('hidden');
          document.body.style.overflow = '';
          input.value = '';
        }

        searchLink.addEventListener('click', function (e) {
          e.preventDefault();
          openOverlay();
        });

        overlay.addEventListener('click', function (e) {
          if (e.target !== input) {
            closeOverlay();
          }
        });

        input.addEventListener('click', function (e) {
          e.stopPropagation();
        });

        // Optional: close overlay on Escape key
        document.addEventListener('keydown', function (e) {
          if (e.key === 'Escape' && !overlay.classList.contains('hidden')) {
            closeOverlay();
          }
        });

        // Sidebar toggle functionality
        const sidebarToggle = document.querySelector('a.side-bar');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
          sidebar.classList.add('active');
          sidebarOverlay.classList.add('active');
          document.body.classList.add('sidebar-open');
        }

        function closeSidebar() {
          sidebar.classList.remove('active');
          sidebarOverlay.classList.remove('active');
          document.body.classList.remove('sidebar-open');
        }

        sidebarToggle.addEventListener('click', function (e) {
          e.preventDefault();
          if (sidebar.classList.contains('active')) {
            closeSidebar();
          } else {
            openSidebar();
          }
        });

        sidebarOverlay.addEventListener('click', function () {
          closeSidebar();
        });

        // Optional: close sidebar on Escape key
        document.addEventListener('keydown', function (e) {
          if (e.key === 'Escape' && sidebar.classList.contains('active')) {
            closeSidebar();
          }
        });
      });
