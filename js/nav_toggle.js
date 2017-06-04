// mobile nav (base) - ypg logo
var ypgLogo = document.getElementById('ypgLogo');
// hamburger button, triggers first level menu
var hamburger = document.getElementById('hamburger');
// hamburger button lines
var ham_line1 = document.getElementById('ham_line1');
var ham_line2 = document.getElementById('ham_line2');
var ham_line3 = document.getElementById('ham_line3');
// mobile nav (1st level) - wrapper
var mobileNav = document.getElementById('ypg_nav_mobile');
// mobile nav (1st level) - 'call us' button
//var mobile_phone= document.getElementById("mobile_phone_btn");
// mobile nav (2nd level) - triggers service menu
var mobileServiceTrigger = document.getElementById('mobile_service_trigger');
// mobile nav (2nd level) - service menu wrapper
var mobileServiceWrap = document.getElementById('mobile_service_wrap');

var mobileNavText = document.getElementsByClassName('mobile_nav_text');

var index;

// deploys mobile nav
function toggleHamburger() {
    // if mobile nav is display, hide it on hamburger press
    if (mobileNav.style.width === '100%') {
    	// hide mobile navigation
        mobileNav.style.width = '0';
        // convert hamburger button back to absolute
        hamburger.style.position = 'absolute';
        // logo transition on menu close
        ypgLogo.style.opacity = '1';
        ypgLogo.style.left = '0';

        // if 2nd level service menu is oepn, toggling Hamburger will close it
        mobileServiceWrap.style.width = '0';

        document.body.style.overflowY = 'auto';



        for (index = 0; index < mobileNavText.length; index++) {
            mobileNavText[index].style.opacity = '0';
            mobileNavText[index].style.WebkitTransition = 'ease-out 0.28s';
            mobileNavText[index].style.transition = 'ease-out 0.28s';
        }

        // reset hamburger line rotation
        ham_line1.style.transform = 'rotate(0deg)';
        ham_line1.style.marginTop = '3px';
        ham_line1.style.background = '#388e3c';
        ham_line3.style.marginTop = '0';
        ham_line2.style.opacity = '1';
        ham_line2.style.width = '100%';
        ham_line3.style.transform = 'rotate(0deg)';
        ham_line3.style.background = '#388e3c';

        // fade out 'call us' button
        //mobile_phone.style.opacity = '0';

        // transitions
        mobileNav.style.WebkitTransition = 'ease-out 0.28s';
        mobileNav.style.transition = 'ease-out 0.28s';
        ham_line1.style.WebkitTransition = 'ease-out 0.24s';
        ham_line1.style.transition = 'ease-out 0.24s';
        ham_line2.style.WebkitTransition = 'ease-out 0.24s';
        ham_line2.style.transition = 'ease-out 0.24s';
        ham_line3.style.WebkitTransition = 'ease-out 0.24s';
        ham_line3.style.transition = 'ease-out 0.24s';
        //mobile_phone.style.WebkitTransition = 'ease-out 0.24s';
        //mobile_phone.style.transition = 'ease-out 0.24s';
        ypgLogo.style.WebkitTransition = 'ease-out 0.3s';
        ypgLogo.style.transition = 'ease-out 0.3s';
        mobileServiceWrap.style.WebkitTransition = 'ease-out 0.34s';
        mobileServiceWrap.style.transition = 'ease-out 0.34s';

    // else if mobile nav is hidden, display it on hamburger press
    } else {
    	// display mobile navigation
        mobileNav.style.width = '100%';
        // convert hamburger button to fixed
        hamburger.style.position = 'fixed';
        // subtle slide left of yogo when menu is deployed
        ypgLogo.style.opacity = '0';
        ypgLogo.style.left = '-14px';

        document.body.style.overflowY = 'hidden';

        for (index = 0; index < mobileNavText.length; index++) {
            mobileNavText[index].style.opacity = '1';
            mobileNavText[index].style.WebkitTransition = 'ease-out 0.34s';
            mobileNavText[index].style.transition = 'ease-out 0.34s';
        }

        

        // rotate hamburger lines to create 'x' close icon
        ham_line1.style.transform = 'rotate(-45deg)';
        ham_line1.style.background = '#fdd835';
        ham_line1.style.marginTop = '4px';
        ham_line2.style.opacity = '0';
        ham_line2.style.width = '0%';
        ham_line3.style.transform = 'rotate(45deg)';
        ham_line3.style.marginTop = '-14px';
        ham_line3.style.background = '#fdd835';

        // fade in 'call us' button
        //mobile_phone.style.opacity = '1.0';

        // transitions
        mobileNav.style.WebkitTransition = 'ease-out 0.28s';
        mobileNav.style.transition = 'ease-out 0.28s';
        ham_line1.style.WebkitTransition = 'ease-in 0.24s';
        ham_line1.style.transition = 'ease-in 0.24s';
        ham_line2.style.WebkitTransition = 'ease-in 0.2s';
        ham_line2.style.transition = 'ease-in 0.2s';
        ham_line3.style.WebkitTransition = 'ease-in 0.24s';
        ham_line3.style.transition = 'ease-in 0.24s';
        //mobile_phone.style.WebkitTransition = 'ease-out 0.4s';
        //mobile_phone.style.transition = 'ease-out 0.4s';
        ypgLogo.style.WebkitTransition = 'ease-in 0.24s';
        ypgLogo.style.transition = 'ease-in 0.24s';
    }
} // end of toggleHamburger function


// deploys desktop service mega menu
function toggleService() {
    // service nav item
    var serviceTrigger = document.getElementById('serviceTrigger');
    var serviceDropWrap = document.getElementById('service_dropdown');
    var serviceDropItems = document.getElementsByClassName('service_drop_tile');
    var serviceLinks = document.getElementsByClassName('service_links');
    var dropArrow = document.getElementById('drop_arrow');
    var overlay = document.getElementById('drop_overlay');

    // if service dropdown is displayed, hide it on button press
    if (serviceDropWrap.style.height === '320px') {
        serviceDropWrap.style.height = '0';
        serviceTrigger.style.color = '#5d4037 !important';
        serviceTrigger.style.background = 'rgba(255,255,255,0)';

        dropArrow.style.transform = 'rotate(0deg)';
        dropArrow.style.WebkitTransition = 'ease-in-out 0.34s';
        dropArrow.style.transition = 'ease-in-out 0.34s';
        serviceDropWrap.style.WebkitTransition = 'ease-in 0.24s';
        serviceDropWrap.style.transition = 'ease-in 0.24s';

        overlay.style.background = 'rgba(0,0,0,0)';
        overlay.style.WebkitTransition = 'ease-in 0.24s';
        overlay.style.transition = 'ease-in 0.24s';
        overlay.style.zIndex = '1';
        

        for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '0';
            serviceDropItems[index].style.WebkitTransition = 'ease-in 0.21s';
            serviceDropItems[index].style.transition = 'ease-in 0.21s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            serviceLinks[index].style.visibility = 'hidden';
            serviceLinks[index].style.paddingTop = '0';
            serviceLinks[index].style.color = 'rgba(255,255,255,0)';
            serviceLinks[index].style.WebkitTransition = 'ease-in 0.21s';
            serviceLinks[index].style.transition = 'ease-in 0.21s';
        }

    // else if service dropdown is hidden, display it
    } else {
        serviceDropWrap.style.height = '320px';
        serviceTrigger.style.background = 'rgba(255,255,255,1)';
        serviceTrigger.style.color = '#2e7d32 !important';


        dropArrow.style.transform = 'rotate(180deg)';

        dropArrow.style.WebkitTransition = 'ease-in-out 0.34s';
        dropArrow.style.transition = 'ease-in-out 0.34s';
        serviceDropWrap.style.WebkitTransition = 'ease-out 0.24s';
        serviceDropWrap.style.transition = 'ease-out 0.24s';

        overlay.style.background = 'rgba(0,0,0,0.6)';
        overlay.style.WebkitTransition = 'ease-out 0.24s';
        overlay.style.transition = 'ease-out 0.24s';
        overlay.style.zIndex = '4';
        

        for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '160px';
            serviceDropItems[index].style.WebkitTransition = 'ease-out 0.28s';
            serviceDropItems[index].style.transition = 'ease-out 0.28s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            serviceLinks[index].style.visibility = 'visible';
            serviceLinks[index].style.opacity = '1';
            serviceLinks[index].style.color = 'rgba(255,255,255,1)';
            serviceLinks[index].style.paddingTop = '100px';
            serviceLinks[index].style.WebkitTransition = 'ease-out 0.28s';
            serviceLinks[index].style.transition = 'ease-out 0.28s';

        }

    }
}

// deploys 2nd level service menu on mobile
function toggleMobileService() {
    var backBtn = document.getElementById('back_btn');

    if (mobileServiceWrap.style.width === '100%') {
        // hide mobile navigation
        mobileServiceWrap.style.width = '0';
        backBtn.style.opacity = '0';
        backBtn.style.WebkitTransition = 'ease-out 0.28s';
        backBtn.style.transition = 'ease-out 0.28s';
        mobileServiceWrap.style.WebkitTransition = 'ease-out 0.28s';
        mobileServiceWrap.style.transition = 'ease-out 0.28s';

    // else if mobile nav is hidden, display it
    } else {
        // display mobile navigation
        mobileServiceWrap.style.width = '100%';
        backBtn.style.opacity = '1';
        backBtn.style.WebkitTransition = 'ease-out 0.28s';
        backBtn.style.transition = 'ease-out 0.28s';
        mobileServiceWrap.style.WebkitTransition = 'ease-out 0.28s';
        mobileServiceWrap.style.transition = 'ease-out 0.28s';
    }
}
