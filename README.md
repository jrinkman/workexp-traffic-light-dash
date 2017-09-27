# iAuditor Audit Checklist
## Problem Definition
You work for a company that uses iAuditor to audit a number of things within their business. A senior manager has requested a custom webpage that shows an overview of all the company’s templates and the last week’s audit scores for each individual template as a colour status (over 80% green, over 50% yellow, under 50% red).

Build a webpage that utilises the SafetyCulture API, PHP, HTML, CSS and any other languages or tools you wish to use to build this dashboard. 

## Libraries Used
* **[jQuery](https://github.com/jquery/jquery):** Used for AJAX requests and interfacing with DOM elements.
* **[Materialize](https://github.com/Dogfalo/materialize):** A CSS framework based on Material Design. Used for pretty much *all* of the UI.
* **[PJAX-Standalone](https://github.com/thybag/PJAX-Standalone):** One of the few libraries that essentially worked out of the box. Used to dynamically load pages (the version used on the AJAY website is slightly modified to enable the fading transition effects).
* **[NProgress](https://github.com/rstacruz/nprogress):** Used to display the page's loading progress.
* **[ProgressBar.js](https://github.com/kimmobrunfeldt/progressbar.js):** Makes the audit percentage display look *neat*.