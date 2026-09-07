<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
<style>
    :root { color-scheme: light; --cream: #f7f2eb; --paper: #fffcf8; --cocoa: #594236; --muted: #806a5d; --line: #e8dcd0; --accent: #956e54; }
    * { box-sizing: border-box; }
    body { margin: 0; background: var(--cream); color: var(--cocoa); font-family: 'Segoe UI', Arial, sans-serif; font-size: 15px; line-height: 1.6; }
    a { color: inherit; }
    a:focus-visible { outline: 3px solid var(--accent); outline-offset: 5px; }
    .page { max-width: 1000px; margin: auto; padding: 0 28px; }
    .topbar { min-height: 108px; display: flex; align-items: center; justify-content: space-between; gap: 20px; }
    .brand { display: inline-flex; align-items: center; gap: 10px; font-family: Georgia, serif; font-size: 21px; text-decoration: none; }
    .brand span { font-size: 31px; color: var(--accent); }
    nav { display: flex; gap: 6px; }
    nav a { border-radius: 30px; padding: 9px 20px; font-size: 13px; text-decoration: none; transition: background .18s; }
    nav a:hover { background: #eadfd3; }
    nav a[aria-current="page"] { background: var(--cocoa); color: var(--paper); }
    .home-card, .profile-card { background: var(--paper); border: 1px solid var(--line); border-radius: 26px; box-shadow: 0 10px 32px #59423605; }
    .home-card { position: relative; padding: 57px 35px 43px; text-align: center; }
    .access-notice { margin: 0 0 26px; padding: 15px 18px; border: 1px solid #cba98d; border-radius: 12px; background: #f4e6d8; color: var(--cocoa); text-align: left; font-size: 14px; }
    .access-notice p { margin: 5px 0 0; font-size: 13px; }
    .little-note { position: absolute; right: 26px; top: 22px; font-family: Georgia, serif; font-style: italic; font-size: 13px; color: var(--muted); transform: rotate(4deg); }
    .flower { width: 84px; height: 84px; margin: 0 auto 23px; display: grid; place-items: center; border: 1px solid var(--line); border-radius: 50%; background: #f4eade; font-size: 61px; line-height: 1; color: #a77c5d; }
    .eyebrow { margin: 0 0 13px; font-size: 11px; font-weight: 600; letter-spacing: 2.5px; text-transform: uppercase; color: var(--muted); }
    h1 { font-family: Georgia, 'Times New Roman', serif; font-weight: 400; letter-spacing: -1.3px; line-height: 1.2; }
    .home-card h1 { margin: 0; font-size: clamp(30px, 4.5vw, 48px); }
    .home-card h1 span { font-style: italic; }
    .intro { color: var(--muted); margin: 23px auto; line-height: 1.85; }
    .tags { display: flex; flex-wrap: wrap; justify-content: center; gap: 9px; margin-bottom: 29px; }
    .tags span { border: 1px solid var(--line); border-radius: 25px; padding: 5px 14px; font-size: 12px; color: var(--muted); }
    .button { display: inline-flex; gap: 25px; align-items: center; padding: 13px 25px; border-radius: 12px; background: var(--cocoa); color: var(--paper); font-size: 14px; text-decoration: none; transition: background .18s; }
    .button:hover { background: #76523f; }
    .small-note { color: var(--muted); font-family: Georgia, serif; font-size: 13px; font-style: italic; margin: 22px 0 0; }
    footer { padding: 25px 0; text-align: center; color: var(--muted); font-size: 11px; letter-spacing: .5px; }
    .profile-card { padding: 36px 42px 32px; }
    .profile-heading { display: flex; justify-content: space-between; align-items: center; gap: 20px; padding-bottom: 26px; border-bottom: 1px solid var(--line); }
    .profile-heading h1 { margin: 0; font-size: clamp(28px, 4vw, 39px); }
    .heading-heart { margin-left: 12px; font-size: 32px; color: var(--accent); }
    .subtitle { color: var(--muted); font-size: 13px; margin: 11px 0 0; }
    .small-flower { flex-shrink: 0; width: 70px; height: 70px; font-size: 49px; margin: 0; }
    .profile-section { padding-top: 23px; }
    h2 { margin: 0 0 20px; font-family: Georgia, serif; font-weight: 400; font-size: 20px; }
    h2 > span { display: inline-block; margin-right: 12px; font-family: 'Segoe UI', Arial, sans-serif; font-size: 10px; letter-spacing: 1px; color: var(--muted); }
    .details { display: grid; grid-template-columns: 1fr 1.1fr 1.2fr; gap: 23px 22px; margin: 0 0 25px; }
    .item { min-width: 0; }
    dt { margin-bottom: 5px; font-size: 10px; color: var(--muted); letter-spacing: 1.3px; text-transform: uppercase; }
    dd { margin: 0; font-size: 13px; font-weight: 500; overflow-wrap: anywhere; }
    dd a { text-decoration-color: var(--line); text-underline-offset: 4px; }
    .interests { border-top: 1px solid var(--line); }
    .interest-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .interest-card { border: 1px solid var(--line); border-radius: 14px; padding: 17px 20px; }
    h3 { font-size: 13px; font-weight: 600; margin: 0 0 8px; }
    h3 span { color: var(--accent); margin-right: 7px; font-size: 18px; }
    .interest-card p, .about-note p { color: var(--muted); font-size: 13px; line-height: 1.75; margin: 0; }
    .about-note { background: #f5ede3; border-radius: 13px; padding: 18px 21px; margin-top: 16px; display: flex; align-items: center; gap: 17px; }
    .about-note h3 { margin-bottom: 4px; }
    .note-heart { color: var(--accent); font-size: 31px; }
    @media (max-width: 700px) {
        .page { padding: 0 18px; }
        .topbar { min-height: 100px; }
        .brand { font-size: 17px; gap: 6px; }
        nav a { padding: 8px 12px; font-size: 12px; }
        .profile-card { padding: 28px 24px; }
        .details { grid-template-columns: 1fr 1fr; }
        .small-flower { width: 54px; height: 54px; font-size: 39px; }
        .heading-heart { display: none; }
    }
    @media (max-width: 450px) {
        .topbar { flex-direction: column; justify-content: center; gap: 10px; padding: 20px 0; }
        .home-card { padding: 64px 22px 35px; }
        .little-note { right: 20px; font-size: 12px; }
        .desktop-break { display: none; }
        .profile-card { padding: 25px 20px; }
        .profile-heading { gap: 10px; }
        .profile-heading h1 { font-size: 28px; }
        .profile-heading .eyebrow { font-size: 9px; }
        .details, .interest-grid { grid-template-columns: 1fr; }
        .details { gap: 18px; }
        .about-note { align-items: flex-start; }
        h2 { font-size: 19px; }
    }
</style>
</head>
<body>
<div class="page">
    <header class="topbar">
        <a class="brand" href="<?= site_url('student') ?>"><span aria-hidden="true">&#10047;</span> my little corner</a>
        <nav aria-label="Main navigation">
            <a href="<?= site_url('student') ?>" aria-current="page">Home</a>
            <a href="<?= site_url('student/profile') ?>">Student Profile</a>
        </nav>
    </header>
    <main class="home-card">
        <span class="little-note">a little space to grow &#9825;</span>
        <?php if (!empty($access_message)): ?>
            <div class="access-notice" role="alert">
                <strong><?= htmlspecialchars($access_message) ?></strong>
                <p>You're on Home now. You can open Student Profile using the link above.</p>
            </div>
        <?php endif; ?>
        <div class="flower" aria-hidden="true">&#10047;</div>
        <p class="eyebrow">Student Home</p>
        <h1>Hello, I'm<br><span><?= htmlspecialchars($name) ?>.</span></h1>
        <p class="intro">Welcome to my little corner of the web. A collection of<br class="desktop-break"> what I'm learning, what I love, and who I'm becoming.</p>
        <div class="tags">
            <span><?= htmlspecialchars($course) ?></span>
            <span><?= htmlspecialchars($year) ?> &middot; <?= htmlspecialchars($section) ?></span>
        </div>
        <a class="button" href="<?= site_url('student/profile') ?>">Get to know me <span aria-hidden="true">&rarr;</span></a>
        <p class="small-note">learning a little, dreaming a lot.</p>
    </main>
    <footer>wrysha &#9825; &middot; <?= htmlspecialchars($page_title) ?></footer>
</div>
</body>
</html>
