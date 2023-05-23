function makeDraggable(selector) {

    const elements = document.querySelectorAll(selector);

    elements.forEach((element) => {
        let startX;
        let scrollLeft;
        let isDragging = false;

        element.addEventListener("mousedown", startDrag);
        element.addEventListener("mousemove", drag);
        element.addEventListener("mouseup", stopDrag);
        element.addEventListener("mouseleave", stopDrag);

        element.addEventListener("touchstart", startDrag);
        element.addEventListener("touchmove", drag);
        element.addEventListener("touchend", stopDrag);

        function startDrag(e) {
            isDragging = true;
            startX = getPositionX(e);
            scrollLeft = element.scrollLeft;
        }

        function drag(e) {
            if (!isDragging) return;
            e.preventDefault();
            const x = getPositionX(e);
            const walk = x - startX;
            element.scrollLeft = scrollLeft - walk;
        }

        function stopDrag() {
            isDragging = false;
        }

        function getPositionX(e) {
            return e.type.includes("mouse") ? e.pageX : e.touches[0].clientX;
        }
    })
}

makeDraggable(".draggable");
