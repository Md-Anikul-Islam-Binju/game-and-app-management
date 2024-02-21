class SiteFooter extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback() {
		this.innerHTML = `
			<footer class="wrapper footer-wrapper">
				<div class="triangle-2"></div>
				<div class="triangle-1"></div>
				<div class="footer-top-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-6 col-lg-3">
								<div class="footer_widget">
									<h2>Activities</h2>
									<ul>
										<li><a href="#">Groups</a></li>
										<li><a href="#">Do</a></li>
										<li><a href="#">Discuss</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Talk</a></li>
									</ul>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="footer_widget">
									<h2>Activities</h2>
									<ul>
										<li><a href="#">Groups</a></li>
										<li><a href="#">Do</a></li>
										<li><a href="#">Discuss</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Talk</a></li>
									</ul>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="footer_widget">
									<h2>Activities</h2>
									<ul>
										<li><a href="#">Groups</a></li>
										<li><a href="#">Do</a></li>
										<li><a href="#">Discuss</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Talk</a></li>
									</ul>
								</div>
							</div>
							<div class="col-12 col-md-6 col-lg-3">
								<div class="footer_widget">
									<h2>Activities</h2>
									<ul>
										<li><a href="#">Groups</a></li>
										<li><a href="#">Do</a></li>
										<li><a href="#">Discuss</a></li>
										<li><a href="#">Blog</a></li>
										<li><a href="#">Talk</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
		`;
	}
}
customElements.define('site-footer', SiteFooter);