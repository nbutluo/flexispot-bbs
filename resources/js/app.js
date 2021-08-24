$(function() {
    $(document).pjax("a", "body");

    $(document).on("pjax:start", function() {
        NProgress.start();
    });
    $(document).on("pjax:end", function() {
        NProgress.done();
        self.siteBootUp();
    });
});
