<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br />
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br />
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>

					<div class="switch-block">
						<h4>Select Theme</h4>
						<div class="" style="padding-top:5px;">
						<button class="btn btn-primary btn-round" onclick="changeTheme('default')">Default</button>
						<button class="btn btn-default btn-round" onclick="changeTheme('dark')">Dark</button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
			<script>
				var theme2 = localStorage.getItem('Theme');
				if (theme2 != undefined) {
					if(theme2 == 'dark'){
						document.getElementById("navbarheader").removeAttribute("data-background-color");
						document.getElementById("navbarheader").setAttribute("data-background-color", "dark");

						document.getElementById("logoheader").removeAttribute("data-background-color");
						document.getElementById("logoheader").setAttribute("data-background-color", "dark");

						document.getElementsByTagName("body")[0].setAttribute("data-background-color", "dark");

						document.getElementById("sidebar").setAttribute("data-background-color", "dark2");
					}else{
						document.getElementById("navbarheader").removeAttribute("data-background-color");
						document.getElementById("navbarheader").setAttribute("data-background-color", "blue");

						document.getElementById("logoheader").removeAttribute("data-background-color");
						document.getElementById("logoheader").setAttribute("data-background-color", "blue");

						document.getElementsByTagName("body")[0].removeAttribute("data-background-color");

						document.getElementById("sidebar").removeAttribute("data-background-color");
					}
				}
			</script>
			<script>
				// if (!Element.prototype.requestFullscreen) {
				// 	Element.prototype.requestFullscreen = Element.prototype.mozRequestFullscreen || Element.prototype.webkitRequestFullscreen || Element.prototype.msRequestFullscreen;
				// }

				// if (!document.exitFullscreen) {
				// 	document.exitFullscreen = document.mozExitFullscreen || document.webkitExitFullscreen || document.msExitFullscreen;
				// }

				// if (!document.fullscreenElement) {

				// 	Object.defineProperty(document, 'fullscreenElement', {
				// 		get: function() {
				// 			return document.mozFullScreenElement || document.msFullscreenElement || document.webkitFullscreenElement;
				// 		}
				// 	});

				// 	Object.defineProperty(document, 'fullscreenEnabled', {
				// 		get: function() {
				// 			return document.mozFullScreenEnabled || document.msFullscreenEnabled || document.webkitFullscreenEnabled;
				// 		}
				// 	});
				// }

				document.addEventListener('click', function (event) {
					if (!event.target.hasAttribute('data-toggle-fullscreen')) return;

					if (document.fullscreenElement) {
						document.exitFullscreen();
					} else {
						document.documentElement.requestFullscreen();
					}

				});
			</script>
		</div>