# `Go Live` Checkliste

##  Allgemeine Checkliste
> **Legende**
> - 🔴 must
> - 🟠 should
> - 🟢 could

### SEO
- [x] 🟠 Ich habe [Yoast SEO](#yoast-seo) installiert, aktiviert und konfiguriert.
- [x] 🔴 Ich erlaube in den Einstellungen das Crawlen der Webseite (Einstellungen > Lesen).
- [x] 🔴 Ich habe eine korrekte robots.txt Datei. 
- [x] 🟠 Ich habe eine korrekte sitemap.xml Datei.
- [x] 🟢 Ich habe eine korrekte llms.txt Datei.

### Security
- [ ] 🔴 Die Webseite hat HTTPS aktiviert.
- [x] 🔴 Ich habe [All in One WP Security](#all-in-one-wp-security) installiert und konfiguriert.
- [x] 🟠 Ich habe alle Plugins, die ich nicht brauche, gelöscht.
- [x] 🟠 Ich habe alle Themes, die ich nicht brauche, gelöscht.
- [x] 🔴 Ich habe nur Nutzer:innen in meinem Backend, welche wirklich auch Zugang dazu brauchen. 
- [x] 🟠 Ich habe [Updraft-Plus](#updraft-plus) installiert und konfiguriert.

### Performance
- [x] 🟠 Ich habe mit Google Lighthouse einen Performance-Check durchgeführt und wo nötig Optimierungen vorgenommen.

### Rechtliches
- [ ] 🔴 Die Webseite hat ein korrektes Impressum. [Mehr zur Impressumspflicht](https://www.hostpoint.ch/blog/impressumspflicht-f%C3%BCr-websites/)
- [ ] 🔴 Die Webseite hat eine korrekte Datenschutzpage, welche in den Einstellungen verlinkt ist. [Mehr zur Datenschutzerklärung](https://www.edoeb.admin.ch/de/datenschutzerklaerungen-im-internet)
- [ ] 🔴 Die Webseite hat, falls nötig, einen Cookie-Banner installiert. [Mehr zu Cookie-Bannern](https://www.hostpoint.ch/blog/das-neue-dsg-und-der-cookie-banner-wirrwarr-was-gilt-denn-nun-eigentlich/)

### Allgemeines
- [ ] 🟢 Das Projekt liegt auf GitHub.
- [ ] 🟠 Das Projekt hat ein Favicon.
- [ ] 🟠 Auto-Updates für Plugins sind aktiviert oder ein Update-Zyklus ist definiert und geplant.

### Final Touches
- [ ] 🔴 Basic-Auth ist entfernt.
- [ ] 🟢 Ich habe den [Uptime-Robot](#uptime-robot) installiert und meine Webseite hinzugefügt.

## Checkliste pro Tools

### Yoast SEO
> [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)

- [x] Installieren (Suchbegriff: Yoast SEO)
- [x] Yoast AI deaktivieren (Einstellungen)
- [x] Website-Grundlagen ausfüllen (v.a. Bild)
- [x] Umarbeitung der Titel erzwingen > aktivieren
- [x] Zeige Projektkategorien in den Suchergebnissen > deaktivieren, weil keine Archiv-Pages
- [x] autoren-Archive, Datums-Archive & Format-Archive deaktivieren
- [x] Seiten: SEO-Titel & Beschreibung
- [x] Projekte: SEO-Titel & Beschreibung
- [x] robots.txt checken
- [x] sitemap.xml checken
- [x] llms.txt aktivieren & checken

### All in One WP Security
> [All-In-One Security (AIOS)](https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/)

- [x] Plugin Installieren (Suchbegriff: All-In-One Security)
- [x] Erst-Konfiguration überspringen
- [x] Settings > .htaccess file > `Backup .htaccess file`
- [x] Settings > wp-config.php file > `Backup wp-config.php file`
- [x] Settings > WP version info > **Aktivieren**
- [x] User Security > User Accounts > **User `admin` umbenennen wenn der existiert**
- [x] User Security > User Accounts > **Display-Name soll nicht Login-Name sein**
- [x] User Security > User Accounts > Prevent User enumeration > **Aktivieren**
- [x] User Security > User Accounts > Enforce strong password > **Aktivieren**
- [x] User Security > Login Lockout > **Aktivieren**
- [x] User Security > Force Logout > **Aktivieren**
- [x] Database-Security > Database Prefix > **Change database prefix**
- [x] File Security > File Permissions > **WP-Config Permission setzen**
- [x] File Security > File Protections > Delete WP default files > **Aktivieren**
- [x] File Security > File Protections > Prevent hotlinking > **Aktivieren**
- [x] File Security > File Protections > Disable PHP file editing > **Aktivieren**
- [x] Firewall > PHP Rules > Security enhancements > **Aktivieren**
- [x] Firewall > PHP Rules > Comment Protection > **Aktivieren**
- [x] Firewall > PHP Rules > URL security > **Aktivieren**
- [x] Firewall > PHP Rules > String filtering > **Aktivieren**
- [x] Firewall > PHP Rules > nG firewall rules > **Aktivieren**
- [x] Firewall > PHP Rules > Internet Bot Settings > **Aktivieren**
- [x] Firewall > .htaccess rules > Basic Firewall settings > **Aktivieren**
- [x] Firewall > .htaccess rules > Block debug log > **Aktivieren**
- [x] Firewall > .htaccess rules > Listing directory content > **Aktivieren**
- [ ] Brute Force > Rename Login Page > **Aktivieren und neuer Pfad notieren**
- [x] Brute Force > Honey Pot > **Beide aktivieren**

### Updraft-Plus
> [Updraft-Plus](https://wordpress.org/plugins/updraftplus/)

- [ ] Installieren (Suchbegriff: UpdraftPlus)
- [ ] Settings > Definieren, wie oft gebackupt werden soll
- [ ] FTP als `Storage Location` auswählen
- [ ] Folder für die Backups mit FileZilla erstellen
- [ ] Angaben zum FTP-Account machen
- [ ] Alle Einstellungen so lassen
- [ ] Backup Now durchführen
- [ ] Mit FileZilla den Server prüfen

### Uptime Robot
> [Uptime Robot](https://uptimerobot.com/)

- [ ] Account über GitHub erstellen
- [ ] Monitoring für die Webseite einrichten (nachdem das Basic Auth entfernt wurde)

### Kansleri Cookie Consent
> [Kansleri Cookie Consent](https://wordpress.org/plugins/kansleri-cookie-consent/)

🚨 Nur installieren, wenn wirklich nötig.

- [ ] Installieren (Suchbegriff: Kansleri Cookie Consent)
- [ ] Einstellungen > Cookie Consent
- [ ] Style selber definieren
- [ ] Texte übersetzen
- [ ] Empty Cookie Categories > **Hide... auswählen**
- [ ] Floating settings button > **Deaktivieren**
- [ ] In text.php Modul das hier `<?= wpautop($data['text']); ?>` mit diesem Code ersetzen:
  `<?= apply_filters('the_content',$data['text']); ?>`
- [ ] Shortcode auf der Datenschutz-Page einfügen
- [ ] Cookies > **Scann cookies**
- [ ] Cookies **Save cookies**
- [ ] Policy Page > **Datenschutz-Seite verlinken**
