
plugin.tx_kuehlschrank_kuehlschrankverwaltung {
  view {
    # cat=plugin.tx_kuehlschrank_kuehlschrankverwaltung/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:kuehlschrank/Resources/Private/Templates/
    # cat=plugin.tx_kuehlschrank_kuehlschrankverwaltung/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:kuehlschrank/Resources/Private/Partials/
    # cat=plugin.tx_kuehlschrank_kuehlschrankverwaltung/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:kuehlschrank/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_kuehlschrank_kuehlschrankverwaltung//a; type=string; label=Default storage PID
    storagePid =49,50
  }
}
