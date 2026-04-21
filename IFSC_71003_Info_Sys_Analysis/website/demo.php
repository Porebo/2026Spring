<?php
$counterFile = __DIR__ . '/demo_counter.txt';
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0", LOCK_EX);
}
$currentCount = (int) trim((string) file_get_contents($counterFile));
$currentCount++;
file_put_contents($counterFile, (string) $currentCount, LOCK_EX);

$renderDate = date('F j, Y');
$prototypeLabel = strtoupper('cloud enthusiasts social prototype');
$featureCountFormatted = number_format(3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML + PHP Test & Demo Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        
        h1 {
            color: #667eea;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .nav a {
            color: #667eea;
            text-decoration: none;
            margin-right: 15px;
            font-weight: 500;
        }
        
        .nav a:hover {
            text-decoration: underline;
        }
        
        .section-title {
            color: #764ba2;
            font-size: 1.3em;
            margin-bottom: 12px;
            font-weight: 600;
        }
        
        .intro-section {
            margin-bottom: 25px;
            padding-bottom: 25px;
        }

        .page-badge {
            background: #2e8b57;
            color: #fff;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 0.85em;
            font-weight: 600;
            margin-left: 15px;
        }

        .php-summary {
            margin: 20px 0 30px;
            padding: 22px;
            border-radius: 10px;
            background: #f5f7fb;
            border: 2px solid #dbe4f3;
        }

        .php-summary h2 {
            color: #764ba2;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .php-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px;
            margin: 16px 0;
        }

        .php-card {
            background: #fff;
            border: 1px solid #dbe4f3;
            border-radius: 8px;
            padding: 14px;
        }

        .php-card-title {
            color: #667eea;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .php-live {
            display: inline-block;
            margin-top: 8px;
            padding: 4px 10px;
            background: #eef3ff;
            border-radius: 999px;
            color: #33508d;
            font-size: 0.9em;
            font-weight: 600;
        }

        .code-block {
            background: #0f172a;
            color: #e2e8f0;
            padding: 16px;
            border-radius: 8px;
            overflow-x: auto;
            margin-top: 14px;
        }
        
        .demo-section {
            margin: 15px 0;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            background-color: #f9f9f9;
            position: relative;
        }
        
        .demo-title {
            background-color: #667eea;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 0.85em;
        }
        
        .demo-label {
            font-weight: 600;
            color: #667eea;
            margin-bottom: 8px;
            font-size: 0.95em;
        }
        
        .demo-example {
            background-color: white;
            padding: 10px 10px 10px 20px;
            border-left: 1px solid #667eea;
            margin-top: 8px;
            border-radius: 4px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #667eea;
            color: white;
        }
        
        .homework-frame {
            margin: 40px 0;
            padding: 25px;
            border: 3px solid #667eea;
            border-radius: 8px;
            background-color: #f5f7fb;
        }
        
        .homework-title {
            background-color: #667eea;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            display: inline-block;
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 1.1em;
        }
        
        .hw-back-link {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9em;
            transition: background 0.3s;
        }
        
        .hw-back-link:hover {
            background: #764ba2;
        }
        
        .table-of-contents {
            background-color: #f5f7fb;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            border-left: 4px solid #667eea;
        }
        
        .toc-title {
            font-size: 1.2em;
            font-weight: 700;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .toc-section {
            margin-bottom: 20px;
        }
        
        .toc-section-title {
            font-weight: 700;
            color: #764ba2;
            margin-bottom: 10px;
            font-size: 1.05em;
        }
        
        .toc-list {
            list-style: none;
            padding-left: 0;
            columns: 2;
            column-gap: 30px;
        }
        
        .toc-list li {
            margin-bottom: 8px;
            break-inside: avoid;
        }
        
        .toc-list a {
            color: #667eea;
            text-decoration: none;
            font-size: 0.95em;
        }
        
        .toc-list a:hover {
            text-decoration: underline;
            color: #764ba2;
        }
        
        .back-to-toc {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            background-color: #e8f0ff;
            color: #667eea;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.85em;
            border: 1px solid #667eea;
            transition: all 0.3s;
            position: absolute;
            top: 15px;
            right: 15px;
            margin-top: 0;
        }
        
        .back-to-toc:hover {
            background-color: #667eea;
            color: white;
        }

        .breadcrumbs {
            margin-bottom: 20px;
            font-size: 0.9em;
            color: #666;
            padding: 5px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .breadcrumbs a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        .breadcrumbs span {
            margin: 0 8px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="breadcrumbs">
            <a href="index.php">Home</a> <span>&rsaquo;</span> <a href="hw12.html">HW12</a> <span>&rsaquo;</span> HTML + PHP Demo
        </nav>
        <h1>HTML + PHP Test & Demo Page <span class="page-badge">Views: <?php echo number_format($currentCount); ?></span></h1>
        
        <div class="nav">
            <a href="hw12.html">Go to Homework 12</a>
            <a href="index.php">← Back to Portfolio</a>
        </div>
        
        <div class="table-of-contents" id="toc">
            <div class="toc-title">Table of Contents</div>
            
            <div class="toc-section">
                <div class="toc-section-title">Homework 1 - HTML Commands (1-15)</div>
                <ul class="toc-list">
                    <li><a href="#demo1">1. Bold Text</a></li>
                    <li><a href="#demo2">2. Italic Text</a></li>
                    <li><a href="#demo3">3. Emphasis Text</a></li>
                    <li><a href="#demo4">4. Underlined Text</a></li>
                    <li><a href="#demo5">5. Strikethrough Text</a></li>
                    <li><a href="#demo6">6. Heading Levels</a></li>
                    <li><a href="#demo7">7. Unordered List</a></li>
                    <li><a href="#demo8">8. Ordered List</a></li>
                    <li><a href="#demo9">9. Hyperlink</a></li>
                    <li><a href="#demo10">10. Line Break</a></li>
                    <li><a href="#demo11">11. Horizontal Rule</a></li>
                    <li><a href="#demo12">12. Blockquote</a></li>
                    <li><a href="#demo13">13. Code Text</a></li>
                    <li><a href="#demo14">14. Highlighted Text</a></li>
                    <li><a href="#demo15">15. Subscript and Superscript</a></li>
                </ul>
            </div>
            
            <div class="toc-section">
                <div class="toc-section-title">Homework 2 - HTML Commands (16-30)</div>
                <ul class="toc-list">
                    <li><a href="#demo16">16. Deleted Text</a></li>
                    <li><a href="#demo17">17. Inserted Text</a></li>
                    <li><a href="#demo18">18. Abbreviation</a></li>
                    <li><a href="#demo19">19. Address</a></li>
                    <li><a href="#demo20">20. Definition List</a></li>
                    <li><a href="#demo21">21. Small Text</a></li>
                    <li><a href="#demo22">22. Inline Quote</a></li>
                    <li><a href="#demo23">23. Citation</a></li>
                    <li><a href="#demo24">24. Keyboard Input</a></li>
                    <li><a href="#demo25">25. Variable</a></li>
                    <li><a href="#demo26">26. Sample Output</a></li>
                    <li><a href="#demo27">27. Strong Emphasis</a></li>
                    <li><a href="#demo28">28. Span with Styling</a></li>
                    <li><a href="#demo29">29. Paragraph with Multiple Breaks</a></li>
                    <li><a href="#demo30">30. Nested Lists</a></li>
                </ul>
            </div>
        </div>
        
        <div class="intro-section">
            <div class="section-title">HTML + PHP Test & Demo Page</div>
            <p>Below is the original demo page expanded for HW12. It keeps the earlier HTML demonstrations and now adds live PHP output, quoted PHP code, and a simple file-based hit counter.</p>
        </div>

        <div class="php-summary">
            <h2>HW12 PHP Additions</h2>
            <p>This page now demonstrates three new PHP commands plus a file-based hit counter. The commands selected for HW12 are <code>date()</code>, <code>strtoupper()</code>, and <code>number_format()</code>.</p>

            <div class="php-grid">
                <div class="php-card">
                    <div class="php-card-title">1. <code>date()</code></div>
                    <p>Used to print the current server-rendered date for the page.</p>
                    <span class="php-live">Live Output: <?php echo htmlspecialchars($renderDate, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="php-card">
                    <div class="php-card-title">2. <code>strtoupper()</code></div>
                    <p>Used to transform project text to uppercase for emphasis.</p>
                    <span class="php-live">Live Output: <?php echo htmlspecialchars($prototypeLabel, ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="php-card">
                    <div class="php-card-title">3. <code>number_format()</code></div>
                    <p>Used to format numeric output cleanly for display.</p>
                    <span class="php-live">Live Output: <?php echo htmlspecialchars($featureCountFormatted, ENT_QUOTES, 'UTF-8'); ?> commands added</span>
                </div>
            </div>

            <p><strong>Hit Counter Note:</strong> This demo page still shows a PHP counter example, but the HW12 homepage requirement is now satisfied through <code>index.php</code>, which runs the live homepage counter after upload.</p>

            <div class="code-block"><code>&lt;?php
$counterFile = __DIR__ . '/demo_counter.txt';
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0", LOCK_EX);
}
$currentCount = (int) trim((string) file_get_contents($counterFile));
$currentCount++;
file_put_contents($counterFile, (string) $currentCount, LOCK_EX);

$renderDate = date('F j, Y');
$prototypeLabel = strtoupper('cloud enthusiasts social prototype');
$featureCountFormatted = number_format(3);
?&gt;</code></div>
        </div>
        
        <div class="homework-frame" id="hw1-section">
            <a href="index.php" class="hw-back-link">← Back to Index</a>
            <div class="homework-title">Homework 1 - HTML Commands (1-15)</div>
        
        <!-- Demo 1: Bold -->
        <div class="demo-section" id="demo1">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">1. Bold Text</div>
            <div class="demo-label">The &lt;b&gt; command is for bolding text (this is one way to do it)</div>
            <div class="demo-example">
                This text is <b>bold using the b tag</b> for visual emphasis.
            </div>
            <div class="demo-label" style="margin-top: 10px;">The &lt;strong&gt; command also bolds text (semantic emphasis)</div>
            <div class="demo-example">
                This text is <strong>strong using the strong tag</strong> for semantic emphasis.
            </div>
        </div>
        
        <!-- Demo 2: Italic -->
        <div class="demo-section" id="demo2">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">2. Italic Text</div>
            <div class="demo-label">The &lt;i&gt; command italicizes text for visual styling</div>
            <div class="demo-example">
                This text is <i>italic using the i tag</i> for visual styling.
            </div>
            <div class="demo-label" style="margin-top: 10px;">The &lt;em&gt; command also italicizes text with semantic meaning</div>
            <div class="demo-example">
                This is <em>emphasized text using the em tag</em> for semantic importance.
            </div>
        </div>
        
        <!-- Demo 3: Emphasis -->
        <div class="demo-section" id="demo3">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">3. Emphasis Text</div>
            <div class="demo-label">The &lt;em&gt; command is for emphasis (semantic italic)</div>
            <div class="demo-example">
                This text has <em>emphasis using the em tag</em> for semantic meaning.
            </div>
        </div>
        
        <!-- Demo 4: Underline -->
        <div class="demo-section" id="demo4">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">4. Underlined Text</div>
            <div class="demo-label">The &lt;u&gt; command is for underlining text</div>
            <div class="demo-example">
                This text is <u>underlined using the u tag</u> for emphasis.
            </div>
        </div>
        
        <!-- Demo 5: Strikethrough -->
        <div class="demo-section" id="demo5">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">5. Strikethrough Text</div>
            <div class="demo-label">The &lt;s&gt; command is for strikethrough (marking text as deleted)</div>
            <div class="demo-example">
                This text has a <s>strikethrough using the s tag</s> to show deletion.
            </div>
        </div>
        
        <!-- Demo 6: Headings -->
        <div class="demo-section" id="demo6">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">6. Heading Levels</div>
            <div class="demo-label">The &lt;h2&gt;, &lt;h3&gt;, &lt;h4&gt; commands create headings of different sizes</div>
            <div class="demo-example">
                <h2 style="margin: 5px 0;">This is an h2 heading (second level)</h2>
                <h3 style="margin: 5px 0;">This is an h3 heading (third level)</h3>
                <h4 style="margin: 5px 0;">This is an h4 heading (fourth level)</h4>
            </div>
        </div>
        
        <!-- Demo 7: Unordered List -->
        <div class="demo-section" id="demo7">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">7. Unordered List</div>
            <div class="demo-label">The &lt;ul&gt; and &lt;li&gt; commands create bulleted lists</div>
            <div class="demo-example">
                <ul>
                    <li>First bullet point</li>
                    <li>Second bullet point</li>
                    <li>Third bullet point</li>
                </ul>
            </div>
        </div>
        
        <!-- Demo 8: Ordered List -->
        <div class="demo-section" id="demo8">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">8. Ordered List</div>
            <div class="demo-label">The &lt;ol&gt; and &lt;li&gt; commands create numbered lists</div>
            <div class="demo-example">
                <ol>
                    <li>First item in sequence</li>
                    <li>Second item in sequence</li>
                    <li>Third item in sequence</li>
                </ol>
            </div>
        </div>
        
        <!-- Demo 9: Link -->
        <div class="demo-section" id="demo9">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">9. Hyperlink</div>
            <div class="demo-label">The &lt;a&gt; command creates clickable links to other pages or websites</div>
            <div class="demo-example">
                Click <a href="index.php">here to go back to the portfolio</a> to test this link.
            </div>
        </div>
        
        <!-- Demo 10: Line Break -->
        <div class="demo-section" id="demo10">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">10. Line Break</div>
            <div class="demo-label">The &lt;br&gt; command creates a line break in text</div>
            <div class="demo-example">
                This is the first line.<br>
                This is the second line after a break.<br>
                This is the third line after another break.
            </div>
        </div>
        
        <!-- Demo 11: Horizontal Rule -->
        <div class="demo-section" id="demo11">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">11. Horizontal Rule</div>
            <div class="demo-label">The &lt;hr&gt; command creates a horizontal dividing line</div>
            <div class="demo-example">
                Content above the line
                <hr style="margin: 10px 0;">
                Content below the line
            </div>
        </div>
        
        <!-- Demo 12: Blockquote -->
        <div class="demo-section" id="demo12">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">12. Blockquote</div>
            <div class="demo-label">The &lt;blockquote&gt; command formats text as a quoted passage with indentation</div>
            <div class="demo-example">
                <blockquote style="margin: 10px 0; padding-left: 15px; border-left: 4px solid #667eea;">
                    "Use the blockquote tag to display quoted material from other sources. It typically indents and may add visual styling."
                </blockquote>
            </div>
        </div>
        
        <!-- Demo 13: Code -->
        <div class="demo-section" id="demo13">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">13. Code Text</div>
            <div class="demo-label">The &lt;code&gt; command displays text in a monospace font for code snippets</div>
            <div class="demo-example">
                To create a paragraph, use the <code style="background-color: #f0f0f0; padding: 2px 5px; border-radius: 3px;">&lt;p&gt;...&lt;/p&gt;</code> tag in your HTML.
            </div>
        </div>
        
        <!-- Demo 14: Mark/Highlight -->
        <div class="demo-section" id="demo14">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">14. Highlighted Text</div>
            <div class="demo-label">The &lt;mark&gt; command highlights text with a background color</div>
            <div class="demo-example">
                This text contains a <mark style="background-color: #ffff00;">highlighted section</mark> to draw attention.
            </div>
        </div>
        
        <!-- Demo 15: Subscript & Superscript -->
        <div class="demo-section" id="demo15">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">15. Subscript and Superscript</div>
            <div class="demo-label">The &lt;sub&gt; and &lt;sup&gt; commands create subscript and superscript text</div>
            <div class="demo-example">
                H<sub>2</sub>O is the chemical formula for water (subscript example).<br>
                E=mc<sup>2</sup> is Einstein's famous equation (superscript example).
            </div>
        </div>
        </div>
        
        <div class="homework-nav">
            <a href="hw2.html">Homework 2</a>
            <a href="#hw2-section">Command Demos (HW2)</a>
        </div>
        
        <div class="homework-frame" id="hw2-section">
            <a href="index.php" class="hw-back-link">← Back to Index</a>
            <div class="homework-title">Homework 2 - HTML Commands (16-30)</div>
        
        <!-- Demo 16: Deleted Text -->
        <div class="demo-section" id="demo16">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">16. Deleted Text</div>
            <div class="demo-label">The &lt;del&gt; command marks text as deleted or no longer accurate</div>
            <div class="demo-example">
                The original price was <del>$99.99</del> now on sale for $49.99.
            </div>
        </div>
        
        <!-- Demo 17: Inserted Text -->
        <div class="demo-section" id="demo17">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">17. Inserted Text</div>
            <div class="demo-label">The &lt;ins&gt; command marks text as inserted (typically underlined)</div>
            <div class="demo-example">
                The meeting is scheduled for <ins style="text-decoration: underline;">Friday at 2 PM</ins> (changed from Thursday).
            </div>
        </div>
        
        <!-- Demo 18: Abbreviation -->
        <div class="demo-section" id="demo18">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">18. Abbreviation</div>
            <div class="demo-label">The &lt;abbr&gt; command defines an abbreviation (hover to see the full form in the title)</div>
            <div class="demo-example">
                The <abbr title="HyperText Markup Language">HTML</abbr> standard is maintained by the <abbr title="World Wide Web Consortium">W3C</abbr>. (Hover over the abbreviations to see the full text.)
            </div>
        </div>
        
        <!-- Demo 19: Address -->
        <div class="demo-section" id="demo19">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">19. Address</div>
            <div class="demo-label">The &lt;address&gt; command defines contact information for an author or organization</div>
            <div class="demo-example">
                <address>
                    Contact us at:<br>
                    Email: info@example.com<br>
                    Phone: (555) 123-4567<br>
                    Address: 123 Main Street, Springfield, IL 62701
                </address>
            </div>
        </div>
        
        <!-- Demo 20: Definition List -->
        <div class="demo-section" id="demo20">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">20. Definition List</div>
            <div class="demo-label">The &lt;dl&gt;, &lt;dt&gt;, and &lt;dd&gt; commands create definition lists</div>
            <div class="demo-example">
                <dl>
                    <dt><strong>HTML</strong></dt>
                    <dd>HyperText Markup Language - the standard markup language for web pages</dd>
                    <dt><strong>CSS</strong></dt>
                    <dd>Cascading Style Sheets - used for styling and layout of web pages</dd>
                    <dt><strong>JavaScript</strong></dt>
                    <dd>A programming language that adds interactivity to web pages</dd>
                </dl>
            </div>
        </div>
        
        <!-- Demo 21: Small Text -->
        <div class="demo-section" id="demo21">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">21. Small Text</div>
            <div class="demo-label">The &lt;small&gt; command renders text in a smaller font size (often for fine print)</div>
            <div class="demo-example">
                This is regular text. <small>This is small text, often used for footnotes or disclaimers.</small>
            </div>
        </div>
        
        <!-- Demo 22: Inline Quote -->
        <div class="demo-section" id="demo22">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">22. Inline Quote</div>
            <div class="demo-label">The &lt;q&gt; command creates an inline quotation with automatic quotation marks</div>
            <div class="demo-example">
                The developer said, <q>HTML is the foundation of the web.</q>
            </div>
        </div>
        
        <!-- Demo 23: Citation -->
        <div class="demo-section" id="demo23">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">23. Citation</div>
            <div class="demo-label">The &lt;cite&gt; command marks a reference or title of a work (typically italicized)</div>
            <div class="demo-example">
                According to <cite style="font-style: italic;">Web Standards by W3C</cite>, proper HTML usage is essential for accessibility.
            </div>
        </div>
        
        <!-- Demo 24: Keyboard Input -->
        <div class="demo-section" id="demo24">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">24. Keyboard Input</div>
            <div class="demo-label">The &lt;kbd&gt; command represents user keyboard input</div>
            <div class="demo-example">
                To save your document, press <kbd>Ctrl</kbd> + <kbd>S</kbd> or <kbd>Cmd</kbd> + <kbd>S</kbd> on Mac.
            </div>
        </div>
        
        <!-- Demo 25: Variable -->
        <div class="demo-section" id="demo25">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">25. Variable</div>
            <div class="demo-label">The &lt;var&gt; command represents a mathematical or programming variable (typically italicized)</div>
            <div class="demo-example">
                Mathematical example: <var style="font-style: italic;">a</var><sup>2</sup> + <var style="font-style: italic;">b</var><sup>2</sup> = <var style="font-style: italic;">c</var><sup>2</sup><br>
                Programming example: Set <var style="font-style: italic;">count</var> = 0 and increment by 1.
            </div>
        </div>
        
        <!-- Demo 26: Sample Output -->
        <div class="demo-section" id="demo26">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">26. Sample Output</div>
            <div class="demo-label">The &lt;samp&gt; command represents sample output from a program (monospace font)</div>
            <div class="demo-example">
                When you run the program, the output will be:<br>
                <samp style="background-color: #f0f0f0; padding: 5px; display: inline-block; margin-top: 8px; font-family: monospace;">C:\Users&gt; python script.py<br>Hello, World!</samp>
            </div>
        </div>
        
        <!-- Demo 27: Strong Emphasis -->
        <div class="demo-section" id="demo27">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">27. Strong Emphasis</div>
            <div class="demo-label">Combine &lt;strong&gt; and &lt;em&gt; tags for both bold and italic emphasis</div>
            <div class="demo-example">
                Normal text. <strong><em>Very important information</em></strong> that requires bold and italic emphasis. Back to normal text.
            </div>
        </div>
        
        <!-- Demo 28: Span with Styling -->
        <div class="demo-section" id="demo28">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">28. Span with Styling</div>
            <div class="demo-label">The &lt;span&gt; command groups inline content and can be styled with CSS</div>
            <div class="demo-example">
                This text has a <span style="color: #e74c3c; font-weight: bold;">colored and bold section</span> in the middle.
            </div>
        </div>
        
        <!-- Demo 29: Paragraph with Line Breaks -->
        <div class="demo-section" id="demo29">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">29. Paragraph and Line Breaks</div>
            <div class="demo-label">The &lt;p&gt; command creates a paragraph; &lt;br&gt; creates a line break within text</div>
            <div class="demo-example">
                <p>This is the first paragraph using the &lt;p&gt; tag.</p>
                <p>This is the second paragraph. It is separate from the first.<br>But this line is within the same paragraph using &lt;br&gt;.</p>
                <p>This is the third paragraph.</p>
            </div>
        </div>
        
        <!-- Demo 30: Nested Lists -->
        <div class="demo-section" id="demo30">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">30. Nested Lists</div>
            <div class="demo-label">The &lt;ul&gt; and &lt;ol&gt; commands can be nested for hierarchical organization</div>
            <div class="demo-example">
                <ol>
                    <li>First main item
                        <ul>
                            <li>Sub-item A</li>
                            <li>Sub-item B</li>
                        </ul>
                    </li>
                    <li>Second main item
                        <ul>
                            <li>Sub-item C</li>
                            <li>Sub-item D</li>
                        </ul>
                    </li>
                </ol>
            </div>
        </div>

        <!-- NEW COMMANDS FOR HW2 (31-45) -->
        
        <!-- Demo 31: Definition List -->
        <div class="demo-section" id="demo31">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">31. Definition List (&lt;dl&gt;)</div>
            <div class="demo-label">The &lt;dl&gt;, &lt;dt&gt;, and &lt;dd&gt; tags create lists of terms and descriptions</div>
            <div class="demo-example">
                <dl>
                    <dt>HTML</dt>
                    <dd>HyperText Markup Language</dd>
                    <dt>CSS</dt>
                    <dd>Cascading Style Sheets</dd>
                </dl>
            </div>
        </div>

        <!-- Demo 32: Details & Summary -->
        <div class="demo-section" id="demo32">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">32. Collapsible Details (&lt;details&gt;)</div>
            <div class="demo-label">The &lt;details&gt; and &lt;summary&gt; tags create interactive disclosure widgets</div>
            <div class="demo-example">
                <details>
                    <summary>Click to reveal more info</summary>
                    <p>This content is hidden by default but can be toggled by the user.</p>
                </details>
            </div>
        </div>

        <!-- Demo 33: Abbreviation -->
        <div class="demo-section" id="demo33">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">33. Abbreviation (&lt;abbr&gt;)</div>
            <div class="demo-label">The &lt;abbr&gt; tag provides a title for an abbreviation when hovered</div>
            <div class="demo-example">
                The <abbr title="World Wide Web">WWW</abbr> was invented by Tim Berners-Lee.
            </div>
        </div>

        <!-- Demo 34: Blockquote -->
        <div class="demo-section" id="demo34">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">34. Blockquote (&lt;blockquote&gt;)</div>
            <div class="demo-label">The &lt;blockquote&gt; tag defines a section quoted from another source</div>
            <div class="demo-example">
                <blockquote cite="https://www.w3.org">
                    "The power of the Web is in its universality. Access by everyone regardless of disability is an essential aspect."
                </blockquote>
            </div>
        </div>

        <!-- Demo 35: Figures & Figcaption -->
        <div class="demo-section" id="demo35">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">35. Figures & Captions (&lt;figure&gt;)</div>
            <div class="demo-label">The &lt;figure&gt; and &lt;figcaption&gt; tags group images with their captions</div>
            <div class="demo-example">
                <figure style="border: 1px solid #ddd; padding: 10px; width: fit-content;">
                    <div style="width: 100px; height: 100px; background: #3498db; margin-bottom: 5px;"></div>
                    <figcaption>Fig.1 - A blue square representing a placeholder image.</figcaption>
                </figure>
            </div>
        </div>

        <!-- Demo 36: Progress Bar -->
        <div class="demo-section" id="demo36">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">36. Progress Bar (&lt;progress&gt;)</div>
            <div class="demo-label">The &lt;progress&gt; tag represents the completion progress of a task</div>
            <div class="demo-example">
                Task Completion: <progress value="75" max="100"></progress> 75%
            </div>
        </div>

        <!-- Demo 37: Meter -->
        <div class="demo-section" id="demo37">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">37. Scalar Measurement (&lt;meter&gt;)</div>
            <div class="demo-label">The &lt;meter&gt; tag represents a scalar value within a known range</div>
            <div class="demo-example">
                Disk Usage: <meter value="0.6">60%</meter>
            </div>
        </div>

        <!-- Demo 38: Time Tag -->
        <div class="demo-section" id="demo38">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">38. Time Representation (&lt;time&gt;)</div>
            <div class="demo-label">The &lt;time&gt; tag renders a human-readable date/time as machine-readable</div>
            <div class="demo-example">
                The next class is on <time datetime="2026-02-12">February 12th</time>.
            </div>
        </div>

        <!-- Demo 39: Mark Text -->
        <div class="demo-section" id="demo39">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">39. Highlighted Text (&lt;mark&gt;)</div>
            <div class="demo-label">The &lt;mark&gt; tag highlights text for reference or notation purposes</div>
            <div class="demo-example">
                This is a <mark>very important</mark> point to remember.
            </div>
        </div>

        <!-- Demo 40: Keyboard Input -->
        <div class="demo-section" id="demo40">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">40. Keyboard Input (&lt;kbd&gt;)</div>
            <div class="demo-label">The &lt;kbd&gt; tag represents user keyboard input</div>
            <div class="demo-example">
                Press <kbd>Ctrl</kbd> + <kbd>C</kbd> to copy the text.
            </div>
        </div>

        <!-- Demo 41: Subscript & Superscript -->
        <div class="demo-section" id="demo41">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">41. Sub & Super Scripts (&lt;sub&gt;, &lt;sup&gt;)</div>
            <div class="demo-label">Tags for chemical formulas or mathematical exponents</div>
            <div class="demo-example">
                H<sub>2</sub>O and E = mc<sup>2</sup>
            </div>
        </div>

        <!-- Demo 42: Interactive Button -->
        <div class="demo-section" id="demo42">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">42. Basic Button (&lt;button&gt;)</div>
            <div class="demo-label">The &lt;button&gt; tag creates a clickable button element</div>
            <div class="demo-example">
                <button type="button" onclick="alert('Hello!')">Click Me!</button>
            </div>
        </div>

        <!-- Demo 43: Horizontal Rule Styles -->
        <div class="demo-section" id="demo43">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">43. Separator (&lt;hr&gt;)</div>
            <div class="demo-label">The &lt;hr&gt; tag defines a thematic break between paragraphs</div>
            <div class="demo-example">
                Top Section
                <hr>
                Bottom Section
            </div>
        </div>

        <!-- Demo 44: Address Tag -->
        <div class="demo-section" id="demo44">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">44. Contact Info (&lt;address&gt;)</div>
            <div class="demo-label">The &lt;address&gt; tag provides contact information for the author/owner</div>
            <div class="demo-example">
                <address>
                    UA Little Rock<br>
                    2801 S University Ave<br>
                    Little Rock, AR 72204
                </address>
            </div>
        </div>

        <!-- Demo 45: Code Snippet -->
        <div class="demo-section" id="demo45">
            <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
            <div class="demo-title">45. Code Block (&lt;code&gt;)</div>
            <div class="demo-label">The &lt;code&gt; tag displays fragments of computer code</div>
            <div class="demo-example">
                Use <code>console.log("Hello World");</code> to print to the console.
            </div>
        </div>

        </div>

        <div class="homework-frame" id="hw6-js-section">
            <a href="index.php" class="hw-back-link">← Back to Index</a>
            <div class="homework-title">Homework 6 - JavaScript Commands (46-51)</div>

            <div class="demo-section" id="demo46">
                <a href="#toc" class="back-to-toc">↑ Back to Contents</a>
                <div class="demo-title">46-51. JavaScript Output and Utility Commands</div>
                <div class="demo-label">Six alphabetized JavaScript commands, each triggered by a button click.</div>
                <div class="demo-example">
                    <div style="display:flex; flex-wrap:wrap; gap:10px; margin-bottom:12px;">
                        <button type="button" onclick="hw6Alert()">46. alert()</button>
                        <button type="button" onclick="hw6Confirm()">47. confirm()</button>
                        <button type="button" onclick="hw6ConsoleLog()">48. console.log()</button>
                        <button type="button" onclick="hw6DomUpdate()">49. document.getElementById().innerHTML</button>
                        <button type="button" onclick="hw6MathMax()">50. Math.max()</button>
                        <button type="button" onclick="hw6StringUpper()">51. String.toUpperCase()</button>
                    </div>
                    <div id="hw6-output" style="background:#eef3ff; border-left:4px solid #667eea; border-radius:6px; padding:10px; min-height:44px;">
                        Click a button to see HW6 output here.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setHw6Output(text) {
            document.getElementById("hw6-output").innerHTML = text;
        }

        function hw6Alert() {
            alert("HW6 alert(): This command displays a popup message.");
            setHw6Output("Executed <strong>alert()</strong> successfully.");
        }

        function hw6Confirm() {
            const accepted = confirm("HW6 confirm(): Click OK to continue or Cancel to decline.");
            setHw6Output(`Executed <strong>confirm()</strong>. User selection: <strong>${accepted ? "OK" : "Cancel"}</strong>.`);
        }

        function hw6ConsoleLog() {
            const message = "HW6 console.log(): message sent to developer console.";
            console.log(message);
            setHw6Output(`Executed <strong>console.log()</strong>. Check console for: "${message}"`);
        }

        function hw6DomUpdate() {
            setHw6Output("Executed <strong>document.getElementById().innerHTML</strong> by updating this output area.");
        }

        function hw6MathMax() {
            const maxValue = Math.max(14, 28, 42, 7);
            setHw6Output(`Executed <strong>Math.max()</strong>. Result for [14, 28, 42, 7] is <strong>${maxValue}</strong>.`);
        }

        function hw6StringUpper() {
            const value = "homework 6 javascript practice";
            setHw6Output(`Executed <strong>String.toUpperCase()</strong>: ${value.toUpperCase()}`);
        }
    </script>
</body>
</html>
