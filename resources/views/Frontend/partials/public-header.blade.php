<div class="bento bento-boxes">
          <div class="card-border"></div>
          <div class="bento-content flex flex-row items-center justify-between header-padding rounded-2xl">
          <div class="website-logo flex-1">
            <a href="{{ route('home') }}" class="logo flex justify-start items-center gap-2">
              <img
                src="{{ asset('src/img/logo-gradient.svg') }}"
                alt="portfolio logo"
                class="w-14"
              />
              <span class="header font-semibold text-lg logo-text"
                >بنتوفولیو</span
              >
            </a>
          </div>

          <nav class="menu flex-2 justify-center hidden lg:flex">
            <ul class="flex flex-row gap-12">
              <li>
                <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 link">
                  <i class="fa-solid fa-house text-xl link-icon"></i>
                  <span class="menu_item link-text">خانه</span>
                </a>
              </li>
              <li>
                <a href="{{ route('portfolios') }}" class="flex items-center justify-center gap-2 link">
                  <i class="fa-solid fa-folder-open text-xl link-icon"></i>
                  <span class="menu_item link-text">پروژه‌ها</span>
                </a>
              </li>
              <li>
                <a href="{{ route('posts.archive') }}" class="flex items-center justify-center gap-2 link">
                  <i class="fa-solid fa-newspaper text-xl link-icon"></i>
                  <span class="menu_item link-text">بلاگ</span>
                </a>
              </li>
            </ul>
          </nav>

          <div class="buttons flex flex-1 justify-end gap-4 items-center">
            <div class="theme-switch bento p-2 hidden lg:flex">
              <div class="toggle-switch">
                <div
                  class="toggle-option active light-option"
                  data-theme="light"
                >
                  <i class="fa-solid fa-sun-bright"></i>
                </div>
                <div class="toggle-option dark-option" data-theme="dark">
                  <i class="fa-solid fa-moon-stars"></i>
                </div>
                <div class="toggle-slider"></div>
              </div>
            </div>
            <button class="contact-button hidden lg:flex">
              ارتباط با من
              <i class="fa-solid fa-phone"></i>
            </button>
            <button class="mobile-menu-button flex lg:hidden">
              <i class="fa-solid fa-bars fa-xl icon-hover"></i>
            </button>
          </div>
          </div>
        </div>