## Input Options

The following input options could be set in template variable settings:

Setting | Description | Default
------- | ----------- | -------
Allow Blank | If set to No, MODX will not allow the user to save the Resource until a valid, non-blank value has been entered in the From Date input. | Yes
Depth | (Type = Resource) The levels deep that the query to grab the list of Resources will go. | 10
Field Template | Field template for the SuperBoxSelect (could contain html tags). Default: {title} ({id}) | -
Limit to Related Context | (Type = Resource) If Yes, will only include the Resources related to the context of the current Resource. | No
Max. Elements | Maximum number of elements in the list. 0 means no limit | -
Package | Folder name of a package, where the 'types' getlists processor are retrieved from. | -
Page Size | (Type = Resource) If the page size is greater than 0, a pagination is displayed in the footer of the dropdown list. | -
Parents | A list of IDs to grab children for the list. | -
Stack Items | If enabled, the SuperBoxSelect items will be stacked one per line. Per default the items are displayed inline. | No
Type | Content type of the dropdown list. | Resources
Where Conditions | A JSON object of where conditions to filter by in the query that grabs the list of Resources. (Does not support TV searching.) Examples: `[{"template:=":"4"}]`, `[{"pagetitle:!=":"Home"}]`, `[{"parent:IN":[34,56]}]` | -
Allowed Usergroups | (Type = Users) Comma separated list of allowed usergroups. | -
Denied Usergroups | (Type = Users) Comma separated list of allowed usergroups. | - 
Denied Usergroups | (Type = Users) Comma separated list of allowed usergroups. | - 
