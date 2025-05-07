<footer class="footer-transparent">
    <div class="footer-content">
        <h2>LYD-TV</h2>
        <p>Projet universitaire — Licence Informatique</p>
        <ul>
            <li>Yasmine Labchri</li>
            <li>Oulouna Lyna</li>
            <li>Hammaz Dhyia</li>
        </ul>
        <p>&copy; <span id="year"></span> LYD-TV.</p>

        <p>Ressources : </p>
        <ul>
            <li>Gregory Bourguin</li>
            <li>Netflix</li>
            <li>Xalaflix</li>
            <li>Wikipedia</li>
            <li>ChatGPT</li>
        </ul>
    </div>
</footer>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>

<script>
    window.addEventListener("scroll", function () {
        const footer = document.querySelector("footer.footer-transparent");
        const scrollThreshold = 200;

        if (window.scrollY > scrollThreshold) {
            footer.classList.add("scrolled-footer");
        } else {
            footer.classList.remove("scrolled-footer");
        }
    });
</script>