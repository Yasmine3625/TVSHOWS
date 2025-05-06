<footer class="footer-transparent">
    <div class="footer-content">
        <h2>LYD TV</h2>
        <p>Projet universitaire — Licence Informatique</p>
        <ul>
            <li>Yasmine Labchri</li>
            <li>Oulouna Lyna</li>
            <li>Hammaz Dhyia</li>
        </ul>
        <p>&copy; <span id="year"></span> LYD TV.</p>
    </div>
</footer>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script>
    window.addEventListener("scroll", function () {
        const footer = document.querySelector("footer.footer-transparent");
        const scrollThreshold = 200; // ajustable selon la longueur de ta page

        if (window.scrollY > scrollThreshold) {
            footer.classList.add("scrolled-footer");
        } else {
            footer.classList.remove("scrolled-footer");
        }
    });
</script>