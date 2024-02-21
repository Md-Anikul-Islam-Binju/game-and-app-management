class BackToTop extends HTMLElement {
	constructor() {
		super();
	}

	connectedCallback() {
		this.innerHTML = `
			<div id="back_top" style="display: none;">
				<a title="Go to Top" href="#">
					<i class="fas fa-level-up-alt"></i>
				</a>
			</div>
		`;
	}
}
customElements.define('back-to-top', BackToTop);