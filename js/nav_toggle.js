function toggleHamburger() {
    // mobile navigation menu wrapper
    var mobileNav = document.getElementById('ypg_nav_mobile');
    var hamburger = document.getElementById('hamburger');
    // main navbar bg, used to toggle opacitity on state changes
    //var opaqueNav = document.getElementById('opaqueNav');
    var ypgLogo = document.getElementById('ypgLogo');

    var ham_line1 = document.getElementById('ham_line1');
    var ham_line2 = document.getElementById('ham_line2');
    var ham_line3 = document.getElementById('ham_line3');

    var mobile_phone= document.getElementById("mobile_phone_btn");

    // if mobile nav is display, hide it on button press
    if (mobileNav.style.width === '100%') {
    	// hide mobile navigation
        mobileNav.style.width = '0';
        // convert hamburger button back to absolute
        hamburger.style.position = 'absolute';
        ypgLogo.style.opacity = '1';
        ypgLogo.style.left = '0';

        ham_line1.style.transform = 'rotate(0deg)';
        ham_line1.style.marginTop = '0';
        ham_line1.style.background = '#388e3c';
        ham_line3.style.marginTop = '0';
        ham_line2.style.opacity = '1';
        ham_line2.style.width = '100%';
        ham_line3.style.transform = 'rotate(0deg)';
        ham_line3.style.background = '#388e3c';

        mobile_phone.style.opacity = '0';

        // if mobile nav is not active, revert back to 65% opacity
        // css transition on state change
        mobileNav.style.WebkitTransition = 'ease-out 0.28s';
        mobileNav.style.MozTransition = 'ease-out 0.28s';
        mobileNav.style.transition = 'ease-out 0.28s';
        ham_line1.style.WebkitTransition = 'ease-out 0.24s';
        ham_line1.style.MozTransition = 'ease-out 0.24s';
        ham_line1.style.transition = 'ease-out 0.24s';
        ham_line2.style.WebkitTransition = 'ease-out 0.24s';
        ham_line2.style.MozTransition = 'ease-out 0.24s';
        ham_line2.style.transition = 'ease-out 0.24s';
        ham_line3.style.WebkitTransition = 'ease-out 0.24s';
        ham_line3.style.MozTransition = 'ease-out 0.24s';
        ham_line3.style.transition = 'ease-out 0.24s';
        mobile_phone.style.WebkitTransition = 'ease-out 0.24s';
        mobile_phone.style.MozTransition = 'ease-out 0.24s';
        mobile_phone.style.transition = 'ease-out 0.24s';
        ypgLogo.style.WebkitTransition = 'ease-out 0.3s';
        ypgLogo.style.MozTransition = 'ease-out 0.3s';
        ypgLogo.style.transition = 'ease-out 0.3s';

    // else if mobile nav is hidden, display it
    } else {
    	// display mobile navigation
        mobileNav.style.width = '100%';
        // convert hamburger button to fixed
        hamburger.style.position = 'fixed';
        // if mobile nav is active, make navbar opaque
        ypgLogo.style.opacity = '0';
        ypgLogo.style.left = '-14px';

        ham_line1.style.transform = 'rotate(-45deg)';
        ham_line1.style.background = '#fdd835';
        ham_line1.style.marginTop = '4px';
        ham_line2.style.opacity = '0';
        ham_line2.style.width = '0%';
        ham_line3.style.transform = 'rotate(45deg)';
        ham_line3.style.marginTop = '-14px';
        ham_line3.style.background = '#fdd835';

        mobile_phone.style.opacity = '1.0';

        ham_line1.style.WebkitTransition = 'ease-in 0.24s';
        ham_line1.style.MozTransition = 'ease-in 0.24s';
        ham_line1.style.transition = 'ease-in 0.24s';
        ham_line2.style.WebkitTransition = 'ease-in 0.2s';
        ham_line2.style.MozTransition = 'ease-in 0.2s';
        ham_line2.style.transition = 'ease-in 0.2s';
        ham_line3.style.WebkitTransition = 'ease-in 0.24s';
        ham_line3.style.MozTransition = 'ease-in 0.24s';
        ham_line3.style.transition = 'ease-in 0.24s';

        // css transition on state change
        mobileNav.style.WebkitTransition = 'ease-out 0.28s';
        mobileNav.style.MozTransition = 'ease-out 0.28s';
        mobileNav.style.transition = 'ease-out 0.28s';
        mobile_phone.style.WebkitTransition = 'ease-out 0.4s';
        mobile_phone.style.MozTransition = 'ease-out 0.4s';
        mobile_phone.style.transition = 'ease-out 0.4s';
        ypgLogo.style.WebkitTransition = 'ease-in 0.24s';
        ypgLogo.style.MozTransition = 'ease-in 0.24s';
        ypgLogo.style.transition = 'ease-in 0.24s';
    }
} // end of toggleHamburger function

function toggleService() {
    
    // service nav item
    var serviceTrigger = document.getElementById('serviceTrigger');
    // service dropdown container
    var serviceDrop = document.getElementById('service_drop');
    // service dropdown container with tiles
    //var serviceDropItems = document.getElementById('service_drop_items');
    var serviceDropItems = document.getElementsByClassName('service_drop_tile');

    var serviceLinks = document.getElementsByClassName('service_links');

    var dropArrow = document.getElementById('drop_arrow');
    var index;

    // if service dropdown is displayed, hide it on button press
    if (serviceDrop.style.height === '320px') {
        serviceDrop.style.height = '0';
        serviceTrigger.style.color = '#5d4037 !important';

        dropArrow.style.transform = 'rotate(0deg)';

        dropArrow.style.WebkitTransition = 'ease-in-out 0.24s';
        dropArrow.style.MozTransition = 'ease-in-out 0.24s';
        dropArrow.style.transition = 'ease-in-out 0.24s';
        serviceDrop.style.WebkitTransition = 'ease-in 0.24s';
        serviceDrop.style.MozTransition = 'ease-in 0.24s';
        serviceDrop.style.transition = 'ease-in 0.24s';

        // fix
        serviceTrigger.style.background = 'rgba(255,255,255,0)';

        for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '0';
            //serviceDropItems[index].style.paddingTop = '0';
            //serviceDropItems[index].style.opacity = '0';
            serviceDropItems[index].style.WebkitTransition = 'ease-in 0.21s';
            serviceDropItems[index].style.MozTransition = 'ease-in 0.21s';
            serviceDropItems[index].style.transition = 'ease-in 0.21s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            serviceLinks[index].style.display = 'hidden';
            serviceLinks[index].style.paddingTop = '0';
        }



    // else if service dropdown is hidden, display it
    } else {
        serviceDrop.style.height = '320px';
        serviceTrigger.style.background = 'rgba(255,255,255,0.65)';
        serviceTrigger.style.color = '#2e7d32 !important';

        dropArrow.style.transform = 'rotate(180deg)';

        dropArrow.style.WebkitTransition = 'ease-in-out 0.24s';
        dropArrow.style.MozTransition = 'ease-in-out 0.24s';
        dropArrow.style.transition = 'ease-in-out 0.24s';
        serviceDrop.style.WebkitTransition = 'ease-out 0.24s';
        serviceDrop.style.MozTransition = 'ease-out 0.24s';
        serviceDrop.style.transition = 'ease-out 0.24s';

         for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '130px';
            //serviceDropItems[index].style.paddingTop = '70px';
            //serviceDropItems[index].style.opacity = '1';
            serviceDropItems[index].style.WebkitTransition = 'ease-out 0.28s';
            serviceDropItems[index].style.MozTransition = 'ease-out 0.28s';
            serviceDropItems[index].style.transition = 'ease-out 0.28s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            serviceLinks[index].style.display = 'block';
            serviceLinks[index].style.paddingTop = '80px';
        }
    }
}