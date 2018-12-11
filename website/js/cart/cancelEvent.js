function cancelEvent(e) {
    // IE
    if(e) {
        e.cancelBubble = true;
    };
    // Others
    if(e.stopPropagation) {
        e.stopPropagation();
    }
}