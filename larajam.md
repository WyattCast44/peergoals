# LaraJam Overview

This document outlines a couple of cool features of this application.

- Lots of neat Blade components
- Leverages the Fortify package to set up Two Factor Auth while still handling all other auth aspects
    - Can be used to show how to use Fortify as a drop in TFA solution

# Other Notes

- Mail driver is set to `log`, in a real application a mail driver would be set and the user's would be required to verify thier email address before using the application.