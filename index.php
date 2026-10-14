
<?php
require_once "scan.php";

$result = null;
$website = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $website = trim($_POST["website"] ?? "");
    $result = checkWebsiteUrl($website);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Guardian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header">
        <h1>Web Guardian</h1>
        <p>Making the Web Accessible for Everyone</p>
    </header>

    <main class="container">

        <section class="hero">
            <h2>Check Your Website Accessibility</h2>
            <p>
                Enter your website URL to begin checking its accessibility.
            </p>

            <form class="scan-form" action="" method="post">
                <input
                    type="url"
                    name="website"
                    placeholder="https://example.com"
                    value="<?php echo htmlspecialchars($website, ENT_QUOTES, 'UTF-8'); ?>"
                    required
                >

                <button type="submit">Scan Website</button>

                <?php if ($result !== null): ?>
                    <div class="result <?php echo $result["valid"] ? "success" : "error"; ?>">
                        <p>
                            <?php
                            echo htmlspecialchars(
                                $result["message"],
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>
                        </p>

                        <?php if ($result["valid"]): ?>
                            <p>
                                Website:
                                <a
                                    href="<?php echo htmlspecialchars($result["url"], ENT_QUOTES, 'UTF-8'); ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <?php echo htmlspecialchars($result["url"], ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </form>
        </section>

        <section class="features">
            <div class="feature">
                <h3>Image Accessibility</h3>
                <p>Prepare to identify images that may be missing alternative text.</p>
            </div>

            <div class="feature">
                <h3>Accessibility Analysis</h3>
                <p>Build tools to identify common accessibility problems.</p>
            </div>

            <div class="feature">
                <h3>Developer Guidance</h3>
                <p>Help developers understand and fix accessibility issues.</p>
            </div>
        </section>

    </main>

    <footer class="footer">
        <p>Web Guardian — Accessibility for Everyone</p>
    </footer>

</body>
</html>
