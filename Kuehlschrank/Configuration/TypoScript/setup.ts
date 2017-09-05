
plugin.tx_kuehlschrank_kuehlschrankverwaltung {
  view {
    templateRootPaths.0 = EXT:kuehlschrank/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_kuehlschrank_kuehlschrankverwaltung.view.templateRootPath}
    partialRootPaths.0 = EXT:kuehlschrank/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_kuehlschrank_kuehlschrankverwaltung.view.partialRootPath}
    layoutRootPaths.0 = EXT:kuehlschrank/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_kuehlschrank_kuehlschrankverwaltung.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_kuehlschrank_kuehlschrankverwaltung.persistence.storagePid}
    #recursive = 1
    classes{
        \Asvet\Kuehlschrank\Domain\Model\Benutzer {
        mapping{
          tableName = fe_users
          columns{
            name.mapOnProperty = fullname
          }
        }
     }
    }
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }

  settings{
    loginpage = 47
      kuelschrank{
        min = 2 
      }
  }
}

calculateajax = PAGE
calculateajax{
  typeNum = 99
  config {
    disableAllHeaderCode = 1
    xhtml_cleaning = 0
    admPanel = 0
    additionalHeaders = Content-type: text/plain
    no_cache = 1
    debug = 0
  }
  
  10 < tt_content.list.20.kuehlschrank_kuehlschrankverwaltung
}

