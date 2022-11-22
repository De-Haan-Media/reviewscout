    <footer class="py-6">
        <div class="container">
            <?php the_field('footer_content', 'option'); ?>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <div class="p my-3 text-center small">© <?php the_field('company', 'option'); ?>. Website ontwikkeld door <a href="https://www.dehaanmedia.nl/" rel="noopener" title="De Haan Media" target="_blank">De Haan Media</a>. Wij gebruiken cookies om de gebruikerservaring te verbeteren.</div>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>