# typo3-tcaorder
#Respect order from multiple select field in the backend in the frontend-output - demo extension for Typo3 9.5
The problem is that Extbase in Typo3 9.5 does not automagically take care of the sort order in the Backend when using 1:n-relations with multiple selects. Additionally there is no way to set the Sql-Order as it would be necessary when querying for records matching uid in e.g. '5,4,3,2,6'. The following would be necessary for proper sorting:

  ORDER BY FIELD (uid, '5,4,3,2,6')

##In the backend of Typo3 the proper behaviour is implemented:

![Alt text](Documentation.tmpl/Images/UserManual/multiple-select.png?raw=true "Optional Title")

##But it is not implemented for the frontend...

This plugin provides a demonstration of a workaround. I hope it will be helpful until this is solved in Extbase.
