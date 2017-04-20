EBSCO Discovery Service placards
======

There are a small number of searches within EDS for which the desired target is unlikely to surface. EBSCO provides a placard system in order to intercept these searches. This code makes use of that system for three use cases:

# Placards

There are three basic placards:

## Databases

Four databases are anticipated. Each placard presents a link to the resource (passed through our proxy).

## Journals

Three journals are anticipated. Each provides links to the journal page (passed through our proxy), as well as to the journal's catalog entry in Barton.

## Library Hours

The simplest application is for when users search for library hours. This is a static HTML placard containing links to individual library hours pages.

# Administration

Changing how these placards are called is done within the EBSCO Admin tool. Choose the group and profile for EDS, then look under the *Viewing Results* tab. There will be an entry for *Widgets*. Each of the widgets above needs its own entry.

Each entry should be set to Custom HTML, and the contents of the `eadmin/admin_*.html` files should be pasted into the Custom HTML field.

# Deploying

The contents of the `eds/` directory should be placed under the web root in an `eds/` directory.
