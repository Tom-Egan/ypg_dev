function toggleService() {
    
    // service nav item
    var serviceTrigger = document.getElementById('serviceTrigger');
    var serviceDropWrap = document.getElementById('service_dropdown');
    var serviceDropItems = document.getElementsByClassName('service_drop_tile');
    var serviceLinks = document.getElementsByClassName('service_links');
    var dropArrow = document.getElementById('drop_arrow');
    var index;
    var dropArrow = document.getElementById('drop_arrow');

    // if service dropdown is displayed, hide it on button press
    if (serviceDropWrap.style.height === '320px') {
        serviceDropWrap.style.height = '0';
        serviceTrigger.style.color = '#5d4037 !important';
        serviceTrigger.style.background = 'rgba(255,255,255,0)';

        dropArrow.style.transform = 'rotate(0deg)';
        dropArrow.style.WebkitTransition = 'ease-in-out 0.34s';
        dropArrow.style.MozTransition = 'ease-in-out 0.34s';
        dropArrow.style.transition = 'ease-in-out 0.34s';
        serviceDropWrap.style.WebkitTransition = 'ease-in 0.24s';
        serviceDropWrap.style.MozTransition = 'ease-in 0.24s';
        serviceDropWrap.style.transition = 'ease-in 0.24s';

        for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '0';
            serviceDropItems[index].style.background = '#000';
            serviceDropItems[index].style.WebkitTransition = 'ease-in 0.21s';
            serviceDropItems[index].style.MozTransition = 'ease-in 0.21s';
            serviceDropItems[index].style.transition = 'ease-in 0.21s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            // serviceLinks[index].style.display = 'hidden';
            serviceLinks[index].style.visibility = 'hidden';
            serviceLinks[index].style.paddingTop = '0';
            serviceLinks[index].style.opacity = '0';
            serviceLinks[index].style.WebkitTransition = 'ease-in 0.21s';
            serviceLinks[index].style.MozTransition = 'ease-in 0.21s';
            serviceLinks[index].style.transition = 'ease-in 0.21s';
        }

    // else if service dropdown is hidden, display it
    } else {
        serviceDropWrap.style.height = '320px';
        serviceTrigger.style.background = 'rgba(255,255,255,1)';
        serviceTrigger.style.color = '#2e7d32 !important';


        dropArrow.style.transform = 'rotate(180deg)';

        dropArrow.style.WebkitTransition = 'ease-in-out 0.34s';
        dropArrow.style.MozTransition = 'ease-in-out 0.34s';
        dropArrow.style.transition = 'ease-in-out 0.34s';
        serviceDropWrap.style.WebkitTransition = 'ease-out 0.24s';
        serviceDropWrap.style.MozTransition = 'ease-out 0.24s';
        serviceDropWrap.style.transition = 'ease-out 0.24s';

        for (index = 0; index < serviceDropItems.length; index++) {
            serviceDropItems[index].style.height = '160px';
            serviceDropItems[index].style.WebkitTransition = 'ease-out 0.28s';
            serviceDropItems[index].style.MozTransition = 'ease-out 0.28s';
            serviceDropItems[index].style.transition = 'ease-out 0.28s';
        }

        for (index = 0; index < serviceLinks.length; index++) {
            // serviceLinks[index].style.display = 'block';
            serviceLinks[index].style.visibility = 'visible';
            serviceLinks[index].style.opacity = '1';
            serviceLinks[index].style.paddingTop = '100px';
            serviceLinks[index].style.WebkitTransition = 'ease-out 0.28s';
            serviceLinks[index].style.MozTransition = 'ease-out 0.28s';
            serviceLinks[index].style.transition = 'ease-out 0.28s';

        }

    }
}