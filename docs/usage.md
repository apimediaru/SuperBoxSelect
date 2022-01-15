## Input Options

The following input options could be set in template variable settings:

Setting | Key | Description | Default
------- | --- | ----------- | -------
Allow Blank | allowBlank | If set to No, MODX will not allow the user to save the Resource until a valid, non-blank value has been entered in the From Date input. | Yes
Allowed Usergroups | allowedUsergroups | **(Type = Users)** Comma separated list of allowed usergroups. | -
Denied Usergroups | deniedUsergroups | **(Type = Users)** Comma separated list of denied usergroups. | -
Depth | depth | **(Type = Resource)** The levels deep that the query to grab the list of Resources will go. | 10
Field Template | fieldTpl | **(System setting superboxselect.advanced = active)** Field template for the SuperBoxSelect (could contain html tags). Default: {title} ({id}) | -
Limit to Related Context | limitRelatedContext | **(Type = Resource)** If Yes, will only include the Resources related to the context of the current Resource. | No
Max. Elements | maxElements | Maximum number of elements in the list. 0 means no limit | -
Page Size | pageSize | If the page size is greater than 0 and max. elements is 1, a pagination is displayed in the footer of the dropdown list. | -
Parents | parents | **(Type = Resource)** A list of IDs to grab children for the list. | -
Stack Items | stackItems | If enabled, the SuperBoxSelect items will be stacked one per line. Per default the items are displayed inline. | No
Type | selectType | Content type of the dropdown list. | Resources
Where Conditions | where | **(Type = Resource)** A JSON object of where conditions to filter by in the query that grabs the list of Resources. (Does not support TV searching.) Examples: `[{"template:=":"4"}]`, `[{"pagetitle:!=":"Home"}]`, `[{"parent:IN":[34,56]}]` | -

## MIGX usage

To use a SuperBoxSelect as input TV type, you have to add the follwing values in
a MIGX config:

```
    "inputTVtype": "superboxselect",
    "configs": {
        "selectType": "users",
        "useRequest": "1",
        ...
    },
```

The other keys and values in the configs object have to be set according to the selectType options.