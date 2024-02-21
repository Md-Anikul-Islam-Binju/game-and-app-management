class SiteHeader extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback() {
		this.innerHTML = `
			<header class="navbar_area header_sticky">
				<div class="main_menu">
					<nav class="navbar navbar-expand-lg navbar-light">
						<div class="container">
							<a class="navbar-brand" href="/">
								<img height="60" draggable="false" src="assets/images/sdmg.png" alt="">
							</a>
							<button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M22.5 10.5H1.5C0.671578 10.5 0 11.1716 0 12C0 12.8284 0.671578 13.5 1.5 13.5H22.5C23.3284 13.5 24 12.8284 24 12C24 11.1716 23.3284 10.5 22.5 10.5Z" fill="currentColor"/>
									<path d="M1.5 6.50001H22.5C23.3284 6.50001 24 5.82843 24 5C24 4.17158 23.3284 3.5 22.5 3.5H1.5C0.671578 3.5 0 4.17158 0 5C0 5.82843 0.671578 6.50001 1.5 6.50001Z" fill="currentColor"/>
									<path d="M22.5 17.5H1.5C0.671578 17.5 0 18.1716 0 19C0 19.8284 0.671578 20.5 1.5 20.5H22.5C23.3284 20.5 24 19.8284 24 19C24 18.1716 23.3284 17.5 22.5 17.5Z" fill="currentColor"/>
								</svg>							
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto mb-2 mb-lg-0 index-menu-list">
									<li class="nav-item">
										<a class="nav-link" href="/">Home</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="about.html">About Us</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/">Services</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="notice.html">Notice Board</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="news.html">News</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Resource </a>
										<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
											<li>
												<a class="dropdown-item" href="projects.html">Projects</a>
											</li>
											<li>
												<a class="dropdown-item" href="training.html">Training</a>
											</li>
											<li>
												<a class="dropdown-item" href="#">Game Development</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="contact.html">Contact Us</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</header>
			<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="visibility: hidden;" aria-hidden="true">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="offcanvasExampleLabel">
						<a class="navbar-brand" href="/">
							<img height="60" draggable="false" src="assets/images/sdmg.png" alt="">
						</a>
					</h5>
					<button class="button_close" data-bs-dismiss="offcanvas" aria-label="Close">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#clip0_405_1736)">
							<path d="M14.1211 12.0002L23.5608 2.56161C24.1467 1.97565 24.1467 1.02563 23.5608 0.439714C22.9748 -0.146246 22.0248 -0.146246 21.4389 0.439714L12.0002 9.8793L2.56161 0.439714C1.97565 -0.146246 1.02563 -0.146246 0.439714 0.439714C-0.146199 1.02567 -0.146246 1.9757 0.439714 2.56161L9.8793 12.0002L0.439714 21.4389C-0.146246 22.0248 -0.146246 22.9748 0.439714 23.5608C1.02567 24.1467 1.9757 24.1467 2.56161 23.5608L12.0002 14.1211L21.4388 23.5608C22.0248 24.1467 22.9748 24.1467 23.5607 23.5608C24.1467 22.9748 24.1467 22.0248 23.5607 21.4389L14.1211 12.0002Z" fill="currentColor"/>
							</g>
							<defs>
							<clipPath id="clip0_405_1736">
							<rect width="24" height="24" fill="white"/>
							</clipPath>
							</defs>
						</svg>
					</button>
				</div>
				<div class="offcanvas-body">
					<ul class="nav flex-column faqMenu_color offcanvas-menu-list">
						<li class="nav-item">
							<a class="nav-link" href="/">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">About Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="notice.html">Notice Board</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="news.html">News</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Resource </a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								li>
									<a class="dropdown-item" href="projects.html">Projects</a>
								</li>
								<li>
									<a class="dropdown-item" href="training.html">Training</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">Game Development</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
			</div>
		`;
	}
}

customElements.define('site-header', SiteHeader);