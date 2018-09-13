define({ "api": [
  {
    "type": "post",
    "url": "api/auth/login",
    "title": "Login for get json web token",
    "name": "Login_for_get_token",
    "group": "Authenticate",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email login</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password login</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "device_code",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Name of device</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n \"body\": \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly8xOTIuMTY4LjEwLjMwL01hcHBpbmdMb2NhdGUvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1MzEwOTk2MjQsImV4cCI6MTUzMTI3MjQyNCwibmJmIjoxNTMxMDk5NjI0LCJqdGkiOiJOblFPMUdjcjNhazg0cXR2In0.HGL06hrNqBMjRMILbPlkRLoTzj62FLi8QL5IPBC__GQ\",\n \"msg\": \"Login successfully\",\n \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error(422)",
          "content": "HTTP/1.1 422 Error\n{\n \"body\": \"\",\n \"msg\": \"invalid_email_or_password\",\n \"code\": \"S422\"\n}",
          "type": "json"
        },
        {
          "title": "Error(500)",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"failed_to_create_token\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/DeviceController.php",
    "groupTitle": "Authenticate"
  },
  {
    "type": "post",
    "url": "api/createNewCafeShop",
    "title": "Create New CafeShop",
    "name": "Create_CafeShop",
    "group": "CafeShop",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "website",
            "description": "<p>Website of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekday",
            "description": "<p>Workingtime of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_by",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"name\": \"コーヒーショップ\",\n\t\t        \"address\": \"155 Cau Giay Street、Quan Hoa、ハノイ、ベトナム\",\n\t\t        \"memo\": \"m\",\n\t\t        \"address_vi\": \"155 đường Cầu Giấy, Quan Hoa, Hà Nội, Việt nam\",\n\t\t        \"address_en\": \"155 Cau Giay Street, Quan Hoa, Hanoi, Vietnam\",\n\t\t        \"address_cn\": \"155 Cau Giay Street，Quan Hoa，河内，越南\",\n\t\t        \"address_es\": \"155 Cau Giay Street, Quan Hoa, Hanoi, Vietnam\",\n\t\t        \"address_ko\": \"155 Cau Giay Street, Quan Hoa, 하노이, 베트남\",\n\t\t        \"name_vi\": \"Quán cà phê\",\n\t\t        \"name_en\": \"Cafe\",\n\t\t        \"name_cn\": \"咖啡厅\",\n\t\t        \"name_es\": \"Cafetería\",\n\t\t        \"name_ko\": \"커피 숍\",\n\t\t        \"memo_vi\": \"m\",\n\t\t        \"memo_en\": \"m\",\n\t\t        \"memo_cn\": \"米\",\n\t\t        \"memo_es\": \"m\",\n\t\t        \"memo_ko\": \"m\",\n\t\t        \"lat\": \"21.031123\",\n\t\t        \"long\": \"105.799456\",\n\t\t        \"category_id\": \"3\",\n\t\t        \"workingtime_weekday\": null,\n\t\t        \"type\": 3,\n\t\t        \"updated_at\": \"2018-08-14 23:39:29\",\n\t\t        \"created_at\": \"2018-08-14 23:39:29\",\n\t\t        \"id\": 9448\n\t\t    },\n\t\t    \"msg\": \"Create success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server error\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/CafeShopsController.php",
    "groupTitle": "CafeShop"
  },
  {
    "type": "post",
    "url": "editCafeShop/:id/:token",
    "title": "Edit CafeShop",
    "name": "Edit_CafeShop",
    "group": "CafeShop",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>CafeShop's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of CafeShopCafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone Number of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekday",
            "description": "<p>Workingtime of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "website",
            "description": "<p>Website of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of CafeShop</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagesDel",
            "description": "<p>List id of image</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n{\n  \"body\": \"\",\n  \"msg\": \"Edit success!\",\n  \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server Error!\",\n  \"code\": \"E500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/CafeShopsController.php",
    "groupTitle": "CafeShop"
  },
  {
    "type": "get",
    "url": "api/getDetailCafeShop/:id/:token",
    "title": "Get detail of CafeShop",
    "name": "Get_CafeShop",
    "group": "CafeShop",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>CafeShops's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t   \"body\":{\n\t\t      \"cafeShop\":{\n\t\t         \"id\":5,\n\t\t         \"name\":\"コーヒーショップ\",\n\t\t         \"address\":\"155 Cau Giay、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t         \"memo\":\"ノート\",\n\t\t         \"address_vi\":\"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t         \"address_en\":\"155 Cau Giay, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t         \"address_cn\":\"155 Cau Giay，Quan Hoa，Cau Giay，河内，越南\",\n\t\t         \"address_es\":\"155 Cau Giay, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t         \"address_ko\":\"155 Cau Giay, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t         \"name_vi\":\"Quán cà phê\",\n\t\t         \"name_en\":\"Cafe\",\n\t\t         \"name_cn\":\"咖啡厅\",\n\t\t         \"name_es\":\"Cafetería\",\n\t\t         \"name_ko\":\"커피 숍\",\n\t\t         \"lat\":\"21.0318615\",\n\t\t         \"long\":\"105.7990658\",\n\t\t         \"category_id\":3,\n\t\t         \"memo_vi\":\"Ghi chú\",\n\t\t         \"memo_en\":\"Note\",\n\t\t         \"memo_cn\":\"注意\",\n\t\t         \"memo_es\":\"Nota\",\n\t\t         \"memo_ko\":\"참고\",\n\t\t         \"workingtime_weekday\":\"[\\\"01:38  AM\\\",\\\"01:38  PM\\\"]\",\n\t\t         \"workingtime_saturday\":null,\n\t\t         \"workingtime_holiday\":null,\n\t\t         \"workingtime_before_holiday\":null,\n\t\t         \"type\":\"3\",\n\t\t         \"icon_tags_id\":null,\n\t\t         \"created_by\":null,\n\t\t         \"created_at\":\"2018-08-14 01:07:54\",\n\t\t         \"updated_at\":\"2018-08-14 17:52:20\",\n\t\t         \"phone\":\"12355555555\",\n\t\t         \"website\":\"cà phê ominext\",\n\t\t         \"utilities_id\":9443\n\t\t      },\n\t\t      \"images\":[\n\t\t         {\n\t\t            \"id\":2034,\n\t\t            \"url\":\"e008fc94f64c006237600cf9ff0352d1.png\",\n\t\t            \"utilities_id\":9443,\n\t\t            \"created_at\":\"2018-08-14 01:11:40\",\n\t\t            \"updated_at\":\"2018-08-14 01:11:40\"\n\t\t         },\n\t\t         {\n\t\t            \"id\":2035,\n\t\t            \"url\":\"721e9db3adcaf25b07870ad301292d68.png\",\n\t\t            \"utilities_id\":9443,\n\t\t            \"created_at\":\"2018-08-14 01:11:40\",\n\t\t            \"updated_at\":\"2018-08-14 01:11:40\"\n\t\t         }\n\t\t      ],\n\t\t      \"tags\":[\n\t\t         {\n\t\t            \"id\":2,\n\t\t            \"slug\":\"aBrLdn5vvT0uukRTMNV6\",\n\t\t            \"name\":\"ポストボックス\\r\\n\",\n\t\t            \"name_vi\":\"Hòm thư\",\n\t\t            \"name_en\":\"Postbox\",\n\t\t            \"name_cn\":\"邮箱\",\n\t\t            \"name_es\":\"Buzón\",\n\t\t            \"name_ko\":\"게시물 상자\",\n\t\t            \"type\":\"0\",\n\t\t            \"created_at\":\"2018-06-28 12:31:43\",\n\t\t            \"updated_at\":\"2018-06-28 12:31:43\",\n\t\t            \"pivot\":{\n\t\t               \"utilities_id\":9443,\n\t\t               \"category_id\":2\n\t\t            }\n\t\t         },\n\t\t         {\n\t\t            \"id\":1,\n\t\t            \"slug\":\"Hc1DNwxh3jwfIdT5HXJY\",\n\t\t            \"name\":\"自動販売機\\r\\n\",\n\t\t            \"name_vi\":\"Máy bán hàng tự động\",\n\t\t            \"name_en\":\"Vending Machine\",\n\t\t            \"name_cn\":\"售货机\",\n\t\t            \"name_es\":\"Máquina expendedora\",\n\t\t            \"name_ko\":\"자판기\",\n\t\t            \"type\":\"0\",\n\t\t            \"created_at\":\"2018-06-28 12:31:43\",\n\t\t            \"updated_at\":\"2018-06-28 12:31:43\",\n\t\t            \"pivot\":{\n\t\t               \"utilities_id\":9443,\n\t\t               \"category_id\":1\n\t\t            }\n\t\t         }\n\t\t      ]\n\t\t   },\n\t\t   \"msg\":\"Get success!\",\n\t\t   \"code\":\"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/CafeShopsController.php",
    "groupTitle": "CafeShop"
  },
  {
    "type": "get",
    "url": "api/getAllCate",
    "title": "",
    "name": "Get_all_Categories",
    "group": "Category",
    "version": "1.0.0",
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n\n{\n\t\t    \"body\": [\n\t\t        {\n\t\t            \"id\": 1,\n\t\t            \"slug\": \"Hc1DNwxh3jwfIdT5HXJY\",\n\t\t            \"name\": \"自動販売機\\r\\n\",\n\t\t            \"name_vi\": \"Máy bàn hàng tự đông\",\n\t\t            \"name_en\": \"Vending Machine\",\n\t\t            \"name_cn\": \"autobot\",\n\t\t            \"name_es\": \"autobot\",\n\t\t            \"name_ko\": \"autobot\",\n\t\t            \"type\": \"0\",\n\t\t            \"created_at\": \"2018-06-28 12:31:43\",\n\t\t            \"updated_at\": \"2018-06-28 12:31:43\"\n\t\t        },\n\t\t        {\n\t\t            \"id\": 2,\n\t\t            \"slug\": \"aBrLdn5vvT0uukRTMNV6\",\n\t\t            \"name\": \"ポストボックス\\r\\n\",\n\t\t            \"name_vi\": \"Hòm thư\",\n\t\t            \"name_en\": \"Postbox\",\n\t\t            \"name_cn\": \"autobot\",\n\t\t            \"name_es\": \"autobot\",\n\t\t            \"name_ko\": \"autobot\",\n\t\t            \"type\": \"0\",\n\t\t            \"created_at\": \"2018-06-28 12:31:43\",\n\t\t            \"updated_at\": \"2018-06-28 12:31:43\"\n\t\t        },\n\t\t        {\n\t\t            \"id\": 3,\n\t\t            \"slug\": \"6AylaqmiHAYa9JbesxVc\",\n\t\t            \"name\": \"コーヒー\\r\\n\",\n\t\t            \"name_vi\": \"Quán cafe\",\n\t\t            \"name_en\": \"Coffee\",\n\t\t            \"name_cn\": \"autobot\",\n\t\t            \"name_es\": \"autobot\",\n\t\t            \"name_ko\": \"autobot\",\n\t\t            \"type\": \"0\",\n\t\t            \"created_at\": \"2018-06-28 12:31:43\",\n\t\t            \"updated_at\": \"2018-06-28 12:31:43\"\n\t\t        },\n\t\t        {\n\t\t            \"id\": 4,\n\t\t            \"slug\": \"TFUErEV33w0hP2CWYC7O\",\n\t\t            \"name\": \"コンビニ\",\n\t\t            \"name_vi\": \"Cửa hàng tiện ích\",\n\t\t            \"name_en\": \"Convenience Store\",\n\t\t            \"name_cn\": \"autobot\",\n\t\t            \"name_es\": \"autobot\",\n\t\t            \"name_ko\": \"autobot\",\n\t\t            \"type\": \"0\",\n\t\t            \"created_at\": \"2018-06-28 12:31:43\",\n\t\t            \"updated_at\": \"2018-06-28 12:31:43\"\n\t\t        },\n\t\t        {\n\t\t            \"id\": 5,\n\t\t            \"slug\": \"4DvhhEKwAjYaU69EMt29\",\n\t\t            \"name\": \"スーパーマーケット\",\n\t\t            \"name_vi\": \"Siêu thị\",\n\t\t            \"name_en\": \"Supermarket\",\n\t\t            \"name_cn\": \"autobot\",\n\t\t            \"name_es\": \"autobot\",\n\t\t            \"name_ko\": \"autobot\",\n\t\t            \"type\": \"0\",\n\t\t            \"created_at\": \"2018-06-28 12:31:43\",\n\t\t            \"updated_at\": \"2018-06-28 12:31:43\"\n\t\t        }\n\t\t    ],\n\t\t    \"msg\": \"Get success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/CategoriesController.php",
    "groupTitle": "Category"
  },
  {
    "type": "post",
    "url": "api/createNewConveninceStore",
    "title": "Create New ConveninceStore",
    "name": "Create_ConveninceStore",
    "group": "ConvenienceStore",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone number of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_hour",
            "description": "<p>Business Hour of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "allow_receive_items",
            "description": "<p>allow_receive_items of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "allow_send_items",
            "description": "<p>allow_send_items of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of ConveninceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "servives",
            "description": "<p>List id of service</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "paymetMethod",
            "description": "<p>List Payment method</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_by",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"name\": \"mm\",\n\t\t        \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t        \"memo\": \"dmmm\",\n\t\t        \"address_vi\": \"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t        \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t        \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t        \"name_vi\": \"mm\",\n\t\t        \"name_en\": \"mm\",\n\t\t        \"name_cn\": \"mm\",\n\t\t        \"name_es\": \"mm\",\n\t\t        \"name_ko\": \"흠\",\n\t\t        \"memo_vi\": \"mm\",\n\t\t        \"memo_en\": \"mm\",\n\t\t        \"memo_cn\": \"mm\",\n\t\t        \"memo_es\": \"mm\",\n\t\t        \"memo_ko\": \"흠\",\n\t\t        \"lat\": \"21.031887\",\n\t\t        \"long\": \"105.799034\",\n\t\t        \"category_id\": \"4\",\n\t\t        \"type\": 4,\n\t\t        \"updated_at\": \"2018-08-14 00:08:09\",\n\t\t        \"created_at\": \"2018-08-14 00:08:09\",\n\t\t        \"id\": 9438\n\t\t    },\n\t\t    \"msg\": \"Create success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server error\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/ConvenienceStoresController.php",
    "groupTitle": "ConvenienceStore"
  },
  {
    "type": "post",
    "url": "editConveninceStore/:id/:token",
    "title": "Edit ConvenienceStore",
    "name": "Edit_ConvenienceStore",
    "group": "ConvenienceStore",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>ConvenienceStore's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone number of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_hour",
            "description": "<p>Business Hour</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "allow_receive_items",
            "description": "<p>Allow receive items</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "allow_send_items",
            "description": "<p>Allow send items</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of ConvenienceStore</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagesDel",
            "description": "<p>List id of image</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "servives",
            "description": "<p>List id of service</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "paymetMethod",
            "description": "<p>List Payment method</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n{\n  \"body\": \"\",\n  \"msg\": \"Edit success!\",\n  \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server Error!\",\n  \"code\": \"E500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/ConvenienceStoresController.php",
    "groupTitle": "ConvenienceStore"
  },
  {
    "type": "get",
    "url": "api/getDetailConvenienceStore/:id/:token",
    "title": "Get detail of ConvenienceStore",
    "name": "Get_ConvenienceStore",
    "group": "ConvenienceStore",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>ConvenienceStore's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"convenienceStores\": {\n\t\t            \"id\": 2204,\n\t\t            \"name\": \"コンビニエンスストア\",\n\t\t            \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t            \"memo\": \"注1\",\n\t\t            \"address_vi\": \"155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t            \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t            \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t            \"name_vi\": \"cửa hàng tiện lợi\",\n\t\t            \"name_en\": \"grocery store\",\n\t\t            \"name_cn\": \"便利店\",\n\t\t            \"name_es\": \"tienda de conveniencia\",\n\t\t            \"name_ko\": \"편의점\",\n\t\t            \"lat\": \"21.0328901\",\n\t\t            \"long\": \"105.8002134\",\n\t\t            \"category_id\": 4,\n\t\t            \"memo_vi\": \"ghi chú 1\",\n\t\t            \"memo_en\": \"note 1\",\n\t\t            \"memo_cn\": \"注1\",\n\t\t            \"memo_es\": \"nota 1\",\n\t\t            \"memo_ko\": \"주 1\",\n\t\t            \"workingtime_weekday\": null,\n\t\t            \"workingtime_saturday\": null,\n\t\t            \"workingtime_holiday\": null,\n\t\t            \"workingtime_before_holiday\": null,\n\t\t            \"type\": \"4\",\n\t\t            \"icon_tags_id\": null,\n\t\t            \"created_by\": null,\n\t\t            \"created_at\": \"2018-08-14 00:09:00\",\n\t\t            \"updated_at\": \"2018-08-14 22:43:17\",\n\t\t            \"city_id\": null,\n\t\t            \"phone\": \"12309999999999999999\",\n\t\t            \"bussiness_hour\": \"\",\n\t\t            \"allow_eat_in\": null,\n\t\t            \"electronic_money\": null,\n\t\t            \"tax\": null,\n\t\t            \"package_shipping\": null,\n\t\t            \"package_receipt\": null,\n\t\t            \"locker\": null,\n\t\t            \"administrative_service\": null,\n\t\t            \"website\": null,\n\t\t            \"nearest_station\": null,\n\t\t            \"nearest_bus_stop\": null,\n\t\t            \"allow_receive_items\": 1,\n\t\t            \"allow_send_items\": 1,\n\t\t            \"payment_method\": \"1.2.3\",\n\t\t            \"utilities_id\": \"9439\",\n\t\t            \"store_code\": null\n\t\t        },\n\t\t        \"images\": [\n\t\t            {\n\t\t                \"id\": 2031,\n\t\t                \"url\": \"c1bec611919346e56df9e444f082520a.png\",\n\t\t                \"utilities_id\": 9439,\n\t\t                \"created_at\": \"2018-08-14 00:43:40\",\n\t\t                \"updated_at\": \"2018-08-14 00:43:40\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 2032,\n\t\t                \"url\": \"26ec2c8a7a71a5632a1dc6938bb91f29.png\",\n\t\t                \"utilities_id\": 9439,\n\t\t                \"created_at\": \"2018-08-14 00:43:40\",\n\t\t                \"updated_at\": \"2018-08-14 00:43:40\"\n\t\t            }\n\t\t        ],\n\t\t        \"tags\": [],\n\t\t        \"services\": [\n\t\t            {\n\t\t                \"id\": 18,\n\t\t                \"convenience_stores_id\": 2204,\n\t\t                \"service_id\": 1,\n\t\t                \"created_at\": \"2018-08-14 22:43:17\",\n\t\t                \"updated_at\": \"2018-08-14 22:43:17\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 19,\n\t\t                \"convenience_stores_id\": 2204,\n\t\t                \"service_id\": 2,\n\t\t                \"created_at\": \"2018-08-14 22:43:17\",\n\t\t                \"updated_at\": \"2018-08-14 22:43:17\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 20,\n\t\t                \"convenience_stores_id\": 2204,\n\t\t                \"service_id\": 3,\n\t\t                \"created_at\": \"2018-08-14 22:43:17\",\n\t\t                \"updated_at\": \"2018-08-14 22:43:17\"\n\t\t            }\n\t\t        ]\n\t\t    },\n\t\t    \"msg\": \"Get success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/ConvenienceStoresController.php",
    "groupTitle": "ConvenienceStore"
  },
  {
    "type": "post",
    "url": "api/sendMailReport/:id/:token",
    "title": "Send mail report",
    "name": "Send_mail_report",
    "group": "Mail",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "id",
            "description": "<p>Id of Utility</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "deviceCode",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "mailRevice",
            "description": "<p>Mail revice</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "contents",
            "description": "<p>Content of report</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longtitude of device</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t    \"body\": \"\",\n\t    \"msg\": \"Send mail success\",\n\t    \"code\": \"S200\"\n\t   }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error(500)",
          "content": "HTTP/1.1 500 Error\n{\n\t    \"body\": \"\",\n\t    \"msg\": \"Server Error\",\n\t    \"code\": \"E500\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/MailController.php",
    "groupTitle": "Mail"
  },
  {
    "type": "post",
    "url": "api/createNewPostbox",
    "title": "Create New PostBox",
    "name": "Create_PostBox",
    "group": "PostBox",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "code",
            "description": "<p>code of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "collection_branch",
            "description": "<p>Collection Branch</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekday",
            "description": "<p>Workingtime Weekday</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekend",
            "description": "<p>Workingtime Weekend</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_by",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"name\": \"m\",\n\t\t        \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t        \"memo\": \"m\",\n\t\t        \"address_vi\": \"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t        \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t        \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t        \"name_vi\": \"m\",\n\t\t        \"name_en\": \"m\",\n\t\t        \"name_cn\": \"米\",\n\t\t        \"name_es\": \"metro\",\n\t\t        \"name_ko\": \"엠\",\n\t\t        \"memo_vi\": \"m\",\n\t\t        \"memo_en\": \"m\",\n\t\t        \"memo_cn\": \"米\",\n\t\t        \"memo_es\": \"metro\",\n\t\t        \"memo_ko\": \"엠\",\n\t\t        \"lat\": \"21.031887\",\n\t\t        \"long\": \"105.799034\",\n\t\t        \"category_id\": \"2\",\n\t\t        \"workingtime_weekday\": \"[\\\"15:41\\\",\\\"15:42\\\"]\",\n\t\t        \"workingtime_saturday\": \"[\\\"15:41\\\",\\\"15:41\\\"]\",\n\t\t        \"type\": 2,\n\t\t        \"updated_at\": \"2018-08-14 23:46:54\",\n\t\t        \"created_at\": \"2018-08-14 23:46:54\",\n\t\t        \"id\": 9449\n\t\t    },\n\t\t    \"msg\": \"Create success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server error\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/PostBoxesController.php",
    "groupTitle": "PostBox"
  },
  {
    "type": "post",
    "url": "editPostbox/:id/:token",
    "title": "Edit PostBox",
    "name": "Edit_PostBox",
    "group": "PostBox",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>PostBox's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "code",
            "description": "<p>code of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "collection_branch",
            "description": "<p>Collection Branch</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekday",
            "description": "<p>Workingtime Weekday</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "workingtime_weekend",
            "description": "<p>Workingtime Weekend</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of PostBox</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagesDel",
            "description": "<p>List id of image</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n{\n  \"body\": \"\",\n  \"msg\": \"Edit success!\",\n  \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server Error!\",\n  \"code\": \"E500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/PostBoxesController.php",
    "groupTitle": "PostBox"
  },
  {
    "type": "get",
    "url": "api/getDetailPostBox/:id/:token",
    "title": "Get detail of PostBox",
    "name": "Get_PostBox",
    "group": "PostBox",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>PostBox's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"postBoxes\": {\n\t\t            \"id\": 1328,\n\t\t            \"name\": \"box2\",\n\t\t            \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t            \"memo\": \"終わりに集める\",\n\t\t            \"address_vi\": \"155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t            \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t            \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t            \"name_vi\": \"box2\",\n\t\t            \"name_en\": \"box2\",\n\t\t            \"name_cn\": \"BOX2\",\n\t\t            \"name_es\": \"box2\",\n\t\t            \"name_ko\": \"상자 2\",\n\t\t            \"lat\": \"21.0123002\",\n\t\t            \"long\": \"105.7331653\",\n\t\t            \"category_id\": 2,\n\t\t            \"memo_vi\": \"thu cuối ngày\",\n\t\t            \"memo_en\": \"collect at the end of the day\",\n\t\t            \"memo_cn\": \"在一天结束时收集\",\n\t\t            \"memo_es\": \"recoger al final del día\",\n\t\t            \"memo_ko\": \"하루가 끝날 무렵 수집하다\",\n\t\t            \"workingtime_weekday\": \"[\\\"07:34\\\",\\\"09:34\\\",\\\"08:34\\\"]\",\n\t\t            \"workingtime_saturday\": \"[\\\"19:34\\\",\\\"18:34\\\",\\\"14:38\\\"]\",\n\t\t            \"workingtime_holiday\": null,\n\t\t            \"workingtime_before_holiday\": null,\n\t\t            \"type\": \"2\",\n\t\t            \"icon_tags_id\": null,\n\t\t            \"created_by\": null,\n\t\t            \"created_at\": \"2018-08-13 23:35:34\",\n\t\t            \"updated_at\": \"2018-08-14 00:47:56\",\n\t\t            \"post_id\": null,\n\t\t            \"utilities_id\": 9428,\n\t\t            \"code\": \"9797949888\",\n\t\t            \"collection_branch\": \"cau giấy\"\n\t\t        },\n\t\t        \"images\": [\n\t\t            {\n\t\t                \"id\": 2033,\n\t\t                \"url\": \"7d6fdfd9074543293220247e3948e8d9.png\",\n\t\t                \"utilities_id\": 9428,\n\t\t                \"created_at\": \"2018-08-14 00:47:56\",\n\t\t                \"updated_at\": \"2018-08-14 00:47:56\"\n\t\t            }\n\t\t        ],\n\t\t        \"tags\": []\n\t\t    },\n\t\t    \"msg\": \"Get success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/PostBoxesController.php",
    "groupTitle": "PostBox"
  },
  {
    "type": "post",
    "url": "api/createNewSupermarket",
    "title": "Create New Supermarket",
    "name": "Create_Supermarket",
    "group": "Supermarket",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "roadGoal",
            "description": "<p>Road Goal</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_hour",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "smService",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "paymentMethod",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "storeType",
            "description": "<p>Type of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_by",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"name\": \"new\",\n\t\t        \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t        \"memo\": \"dmmm\",\n\t\t        \"address_vi\": \"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t        \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t        \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t        \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t        \"name_vi\": \"new\",\n\t\t        \"name_en\": \"new\",\n\t\t        \"name_cn\": \"new\",\n\t\t        \"name_es\": \"new\",\n\t\t        \"name_ko\": \"흠\",\n\t\t        \"memo_vi\": \"new\",\n\t\t        \"memo_en\": \"new\",\n\t\t        \"memo_cn\": \"new\",\n\t\t        \"memo_es\": \"new\",\n\t\t        \"memo_ko\": \"흠\",\n\t\t        \"lat\": \"21.031887\",\n\t\t        \"long\": \"105.799034\",\n\t\t        \"category_id\": \"5\",\n\t\t        \"type\": 5,\n\t\t        \"updated_at\": \"2018-08-14 23:35:51\",\n\t\t        \"created_at\": \"2018-08-14 23:35:51\",\n\t\t        \"id\": 9447\n\t\t    },\n\t\t    \"msg\": \"Create success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server error\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/SupermarketController.php",
    "groupTitle": "Supermarket"
  },
  {
    "type": "post",
    "url": "editSupermarket/:id/:token",
    "title": "Edit Supermarket",
    "name": "Edit_Supermarket",
    "group": "Supermarket",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>Supermarket's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "roadGoal",
            "description": "<p>Road Guide</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone number of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "business_hour",
            "description": "<p>Business Hour</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "smServiceAdd",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "paymentMethod",
            "description": ""
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagesDel",
            "description": "<p>List id of image</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "storeType",
            "description": "<p>Type of Supermarket</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n{\n  \"body\": \"\",\n  \"msg\": \"Edit success!\",\n  \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server Error!\",\n  \"code\": \"E500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/SupermarketController.php",
    "groupTitle": "Supermarket"
  },
  {
    "type": "get",
    "url": "api/getDetailSupermarket/:id/:token",
    "title": "Get detail of Supermarket",
    "name": "Get_Supermarket",
    "group": "Supermarket",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>Supermarket's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\t    \"body\": {\n\t\t        \"supermarket\": {\n\t\t            \"id\": 3,\n\t\t            \"name\": \"ヴィンマール\",\n\t\t            \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n\t\t            \"memo\": \"\",\n\t\t            \"address_vi\": \"155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n\t\t            \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n\t\t            \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n\t\t            \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n\t\t            \"name_vi\": \"Vinmart\",\n\t\t            \"name_en\": \"Vinmart\",\n\t\t            \"name_cn\": \"Vinmart\",\n\t\t            \"name_es\": \"Vinmart\",\n\t\t            \"name_ko\": \"빈 마트\",\n\t\t            \"lat\": \"21.0318287\",\n\t\t            \"long\": \"105.7990688\",\n\t\t            \"category_id\": 5,\n\t\t            \"memo_vi\": \"\",\n\t\t            \"memo_en\": \"\",\n\t\t            \"memo_cn\": \"\",\n\t\t            \"memo_es\": \"\",\n\t\t            \"memo_ko\": \"\",\n\t\t            \"workingtime_weekday\": null,\n\t\t            \"workingtime_saturday\": null,\n\t\t            \"workingtime_holiday\": null,\n\t\t            \"workingtime_before_holiday\": null,\n\t\t            \"type\": \"5\",\n\t\t            \"icon_tags_id\": null,\n\t\t            \"created_by\": null,\n\t\t            \"created_at\": \"2018-08-14 17:58:27\",\n\t\t            \"updated_at\": \"2018-08-14 17:58:27\",\n\t\t            \"store_id\": null,\n\t\t            \"city_id\": null,\n\t\t            \"utilities_id\": 9444,\n\t\t            \"province_group_id\": null,\n\t\t            \"nearest_station\": null,\n\t\t            \"store_type\": null,\n\t\t            \"tel\": \"09888888888\",\n\t\t            \"business_hour\": \"[\\\"08:57  AM\\\",\\\"08:57  PM\\\"]\",\n\t\t            \"road_goal\": null,\n\t\t            \"payment_method\": null\n\t\t        },\n\t\t        \"images\": [\n\t\t            {\n\t\t                \"id\": 2036,\n\t\t                \"url\": \"b5443e1af30d22a839d788e151f7a343.png\",\n\t\t                \"utilities_id\": 9444,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 2037,\n\t\t                \"url\": \"026634ecca2fa21788b4f3dbe8213c69.png\",\n\t\t                \"utilities_id\": 9444,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            }\n\t\t        ],\n\t\t        \"tags\": [],\n\t\t        \"services\": [\n\t\t            {\n\t\t                \"id\": 15,\n\t\t                \"supermarket_id\": 3,\n\t\t                \"service_id\": 1,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 16,\n\t\t                \"supermarket_id\": 3,\n\t\t                \"service_id\": 2,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 17,\n\t\t                \"supermarket_id\": 3,\n\t\t                \"service_id\": 3,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            },\n\t\t            {\n\t\t                \"id\": 18,\n\t\t                \"supermarket_id\": 3,\n\t\t                \"service_id\": 4,\n\t\t                \"created_at\": \"2018-08-14 17:58:27\",\n\t\t                \"updated_at\": \"2018-08-14 17:58:27\"\n\t\t            }\n\t\t        ]\n\t\t    },\n\t\t    \"msg\": \"Get success!\",\n\t\t    \"code\": \"S200\"\n\t\t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/SupermarketController.php",
    "groupTitle": "Supermarket"
  },
  {
    "type": "post",
    "url": "api/deleteUtility/:id",
    "title": "Delete Utility",
    "name": "Delete_Utility",
    "group": "Utility",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>Utility's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json WebToken</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n \"body\": \"\",\n \"msg\": \"Delete success!\",\n \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 404 Error\n{\n \"body\": \"\",\n \"msg\": \"Not found\",\n \"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/UtilitiesController.php",
    "groupTitle": "Utility"
  },
  {
    "type": "get",
    "url": "api/searchUtilitiesWithLocation/:lat/:long/:cate/:token",
    "title": "Search Utilites with category around the selected location less than 1km",
    "name": "Search_Utilities_With_Category",
    "group": "Utility",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "cate",
            "description": "<p>Category's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\"body\": [\n\t\t{\n\t\t\t\"id\": 6,\n\t\t\t\"name\": \"セイコーマート札幌渓仁会リハビリテーション病院店\",\n\t\t\t\"address\": \"北海道札幌市中央区北10条西17丁目36番13号\",\n\t\t\t\"address_vi\": \"null\",\n\t\t\t\"address_en\": \"null\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"Hòm thư 01\",\n\t\t\t\"name_en\": \"Postbox 0\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"43.0704746\",\n\t\t\t\"long\": \"141.3275977\",\n\t\t\t\"category_id\": 6\n\t\t},\n\t\t{\n\t\t\t\"id\": 11,\n\t\t\t\"name\": \"セイコーマートぎょれんビル店\",\n\t\t\t\"address\": \"振り返ると、Cau Giay、 Ha Noi\",\n\t\t\t\"address_vi\": \"北海道札幌市中央区北13条西19丁目37番地の6\",\n\t\t\t\"address_en\": \"null\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"null\",\n\t\t\t\"name_en\": \"null\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"43.07274125\",\n\t\t\t\"long\": \"141.3235431\",\n\t\t\t\"category_id\": 6\n\t\t},\n\t\t{\n\t\t\t\"id\": 12,\n\t\t\t\"name\": \"セイコーマート北14条店\",\n\t\t\t\"address\": \"北海道札幌市中央区北14条西15丁目7\",\n\t\t\t\"address_vi\": \"null\",\n\t\t\t\"address_en\": \"null\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"null\",\n\t\t\t\"name_en\": \"null\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"43.07413016\",\n\t\t\t\"long\": \"141.3329867\",\n\t\t\t\"category_id\": 6\n\t\t}\n\t],\n\t\"msg\": \"Get success!\",\n\t\"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/UtilitiesController.php",
    "groupTitle": "Utility"
  },
  {
    "type": "get",
    "url": "api/getUtiilities/:lat/:long/:token",
    "title": "Get Utilities list around the selected location less than 1km",
    "name": "get_Utilities",
    "group": "Utility",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\"body\": [\n\t\t{\n\t\t\t\"id\": 9303,\n\t\t\t\"name\": \"自動販売機01\",\n\t\t\t\"address\": \"振り返ると、Cau Giay、 Ha Noi\",\n\t\t\t\"address_vi\": \"Dịch vọng hậu, Cầu Giấy, Hà Nội\",\n\t\t\t\"address_en\": \"Dich vong hau, Cau giay, Ha Noi\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"Máy bán hàng tự động 01\",\n\t\t\t\"name_en\": \"Vending Machine 01\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"21.038427\",\n\t\t\t\"long\": \"105.782023\",\n\t\t\t\"category_id\": 1\n\t\t},\n\t\t{\n\t\t\t\"id\": 9305,\n\t\t\t\"name\": \"メールボックス01\",\n\t\t\t\"address\": \"振り返ると、Cau Giay、 Ha Noi\",\n\t\t\t\"address_vi\": \"Dịch vọng hậu, Cầu Giấy, Hà Nội\",\n\t\t\t\"address_en\": \"Dich vong hau, Cau giay, Ha Noi\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"Hòm thư 01\",\n\t\t\t\"name_en\": \"Postbox 0\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"21.0377237\",\n\t\t\t\"long\": \"105.783925\",\n\t\t\t\"category_id\": 2\n\t\t}\n\t],\n\t\"msg\": \"Get success!\",\n\t\"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/UtilitiesController.php",
    "groupTitle": "Utility"
  },
  {
    "type": "get",
    "url": "api/searchUtilitiesInCity/:city/:cate/:lang/:lat/:long/:device_code/:token",
    "title": "Search Utilities with cate in Device's City",
    "name": "search_Utilities_In_City",
    "group": "Utility",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City's name of Device</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "cate",
            "description": "<p>Category's Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of Device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json web token</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>latitude of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>longtitude of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "device_code",
            "description": "<p>Code of device</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n\t\"body\": [\n\t\t{\n\t\t\t\"id\": 9303,\n\t\t\t\"name\": \"自動販売機01\",\n\t\t\t\"address\": \"振り返ると、Cau Giay、 Ha Noi\",\n\t\t\t\"address_vi\": \"Dịch vọng hậu, Cầu Giấy, Hà Nội\",\n\t\t\t\"address_en\": \"Dich vong hau, Cau giay, Ha Noi\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"Máy bán hàng tự động 01\",\n\t\t\t\"name_en\": \"Vending Machine 01\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"21.038427\",\n\t\t\t\"long\": \"105.782023\",\n\t\t\t\"category_id\": 1\n\t\t},\n\t\t{\n\t\t\t\"id\": 9304,\n\t\t\t\"name\": \"自動販売機02\",\n\t\t\t\"address\": \"振り返ると、Cau Giay、 Ha Noi\",\n\t\t\t\"address_vi\": \"Dịch vọng hậu, Cầu Giấy, Hà Nội\",\n\t\t\t\"address_en\": \"Dich vong hau, Cau giay, Ha Noi\",\n\t\t\t\"address_cn\": null,\n\t\t\t\"address_es\": null,\n\t\t\t\"address_ko\": null,\n\t\t\t\"name_vi\": \"Máy bán hàng tự động 02\",\n\t\t\t\"name_en\": \"Vending Machine 02\",\n\t\t\t\"name_cn\": null,\n\t\t\t\"name_es\": null,\n\t\t\t\"name_ko\": null,\n\t\t\t\"lat\": \"21.037761\",\n\t\t\t\"long\": \"105.182176\",\n\t\t\t\"category_id\": 1\n\t\t},\n\t],\n\t \"msg\": \"Get success!\",\n\t \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/UtilitiesController.php",
    "groupTitle": "Utility"
  },
  {
    "type": "post",
    "url": "api/createNewVendingMachine",
    "title": "Create New Vending Machine",
    "name": "Create_Vending_Machine",
    "group": "VendingMachine",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "created_by",
            "description": "<p>Code of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n            \"body\": {\n                \"name\": \"m\",\n                \"address\": \"155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム\",\n                \"memo\": \"m\",\n                \"address_vi\": \"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam\",\n                \"address_en\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n                \"address_cn\": \"155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam\",\n                \"address_es\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam\",\n                \"address_ko\": \"155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남\",\n                \"name_vi\": \"m\",\n                \"name_en\": \"m\",\n                \"name_cn\": \"米\",\n                \"name_es\": \"metro\",\n                \"name_ko\": \"엠\",\n                \"memo_vi\": \"m\",\n                \"memo_en\": \"m\",\n                \"memo_cn\": \"米\",\n                \"memo_es\": \"metro\",\n                \"memo_ko\": \"엠\",\n                \"lat\": \"21.031887\",\n                \"long\": \"105.799034\",\n                \"category_id\": \"2\",\n                \"type\": 1,\n                \"updated_at\": \"2018-08-14 23:48:03\",\n                \"created_at\": \"2018-08-14 23:48:03\",\n                \"id\": 9450\n            },\n            \"msg\": \"Create success!\",\n            \"code\": \"S200\"\n        }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server error\",\n  \"code\": \"S500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/VendingMachineController.php",
    "groupTitle": "VendingMachine"
  },
  {
    "type": "post",
    "url": "editVendingMachine/:id/:token",
    "title": "Edit Vending Machine",
    "name": "Edit_Vending_Machine",
    "group": "VendingMachine",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>Vending Machine's ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "memo",
            "description": "<p>Memo of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lat",
            "description": "<p>Latitude of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "long",
            "description": "<p>Longitude of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lang",
            "description": "<p>Language of device</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tags",
            "description": "<p>List tag of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "imagesAdd",
            "description": "<p>List Image of Vending Machine</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "imagesDel",
            "description": "<p>List id of image</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 Ok\n{\n  \"body\": \"\",\n  \"msg\": \"Edit success!\",\n  \"code\": \"S200\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 500 Error\n{\n  \"body\": \"\",\n  \"msg\": \"Server Error!\",\n  \"code\": \"E500\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/VendingMachineController.php",
    "groupTitle": "VendingMachine"
  },
  {
    "type": "get",
    "url": "api/getDetailVendingMachine/:id/:token",
    "title": "Get detail of Vending Machine",
    "name": "Get_Vending_Machine",
    "group": "VendingMachine",
    "version": "1.0.0",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>Id of Utility</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "token",
            "description": "<p>Json Web token</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "Success",
          "content": "HTTP/1.1 200 OK\n{\n        \"body\": [\n            {\n                \"id\": 138,\n                \"name\": \"ガイア　割山店　スロットエリア入口付近\",\n                \"address\": null,\n                \"memo\": null,\n                \"address_vi\": null,\n                \"address_en\": null,\n                \"address_cn\": null,\n                \"address_es\": null,\n                \"address_ko\": null,\n                \"name_vi\": null,\n                \"name_en\": null,\n                \"name_cn\": null,\n                \"name_es\": null,\n                \"name_ko\": null,\n                \"lat\": \"39.703958\",\n                \"long\": \"140.091910\",\n                \"category_id\": null,\n                \"memo_vi\": null,\n                \"memo_en\": null,\n                \"memo_cn\": null,\n                \"memo_es\": null,\n                \"memo_ko\": null,\n                \"workingtime_weekday\": null,\n                \"workingtime_saturday\": null,\n                \"workingtime_holiday\": null,\n                \"workingtime_before_holiday\": null,\n                \"type\": \"1\",\n                \"icon_tags_id\": null,\n                \"created_by\": null,\n                \"created_at\": \"2018-06-28 12:39:04\",\n                \"updated_at\": \"2018-06-28 12:39:04\",\n                \"images\": [],\n                \"tags\": [\n                    {\n                        \"id\": 17,\n                        \"name\": \"差出箱13号\",\n                        \"tag_name\": \"差出箱13号\",\n                        \"created_at\": \"2018-06-28 12:38:16\",\n                        \"updated_at\": \"2018-06-28 12:38:16\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 17\n                        }\n                    },\n                    {\n                        \"id\": 18,\n                        \"name\": \"銘板なし\",\n                        \"tag_name\": \"銘板なし\",\n                        \"created_at\": \"2018-06-28 12:38:16\",\n                        \"updated_at\": \"2018-06-28 12:38:16\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 18\n                        }\n                    },\n                    {\n                        \"id\": 19,\n                        \"name\": \"丸柱\",\n                        \"tag_name\": \"丸柱\",\n                        \"created_at\": \"2018-06-28 12:38:16\",\n                        \"updated_at\": \"2018-06-28 12:38:16\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 19\n                        }\n                    },\n                    {\n                        \"id\": 22,\n                        \"name\": \"13号一体型ひさし\",\n                        \"tag_name\": \"13号一体型ひさし\",\n                        \"created_at\": \"2018-06-28 12:38:16\",\n                        \"updated_at\": \"2018-06-28 12:38:16\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 22\n                        }\n                    },\n                    {\n                        \"id\": 265,\n                        \"name\": \"オフィスビル\",\n                        \"tag_name\": \"オフィスビル\",\n                        \"created_at\": \"2018-06-28 12:43:38\",\n                        \"updated_at\": \"2018-06-28 12:43:38\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 265\n                        }\n                    },\n                    {\n                        \"id\": 25,\n                        \"name\": \"レターパック表記\",\n                        \"tag_name\": \"レターパック表記\",\n                        \"created_at\": \"2018-06-28 12:38:17\",\n                        \"updated_at\": \"2018-06-28 12:38:17\",\n                        \"pivot\": {\n                            \"utilities_id\": 138,\n                            \"tag_id\": 25\n                        }\n                    }\n        \t            ]\n        \t        },\n        \t        [],\n        \t            {\n        \t                \"id\": 17,\n        \t                \"name\": \"差出箱13号\",\n        \t                \"tag_name\": \"差出箱13号\",\n        \t                \"created_at\": \"2018-06-28 12:38:16\",\n        \t                \"updated_at\": \"2018-06-28 12:38:16\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n        \t                    \"tag_id\": 17\n        \t                }\n        \t            },\n        \t            {\n        \t                \"id\": 18,\n        \t                \"name\": \"銘板なし\",\n        \t                \"tag_name\": \"銘板なし\",\n        \t                \"created_at\": \"2018-06-28 12:38:16\",\n        \t                \"updated_at\": \"2018-06-28 12:38:16\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n                                \"tag_id\": 18\n        \t                }\n        \t            },\n        \t            {\n        \t                \"id\": 19,\n        \t                \"name\": \"丸柱\",\n        \t                \"tag_name\": \"丸柱\",\n        \t                \"created_at\": \"2018-06-28 12:38:16\",\n        \t                \"updated_at\": \"2018-06-28 12:38:16\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n        \t                    \"tag_id\": 19\n        \t                }\n        \t            },\n        \t            {\n        \t                \"id\": 22,\n        \t                \"name\": \"13号一体型ひさし\",\n        \t                \"tag_name\": \"13号一体型ひさし\",\n        \t                \"created_at\": \"2018-06-28 12:38:16\",\n        \t                \"updated_at\": \"2018-06-28 12:38:16\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n        \t                    \"tag_id\": 22\n        \t                }\n        \t            },\n        \t            {\n        \t                \"id\": 265,\n        \t                \"name\": \"オフィスビル\",\n        \t                \"tag_name\": \"オフィスビル\",\n        \t                \"created_at\": \"2018-06-28 12:43:38\",\n        \t                \"updated_at\": \"2018-06-28 12:43:38\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n        \t                    \"tag_id\": 265\n        \t                }\n        \t            },\n        \t            {\n        \t                \"id\": 25,\n        \t                \"name\": \"レターパック表記\",\n        \t                \"tag_name\": \"レターパック表記\",\n        \t                \"created_at\": \"2018-06-28 12:38:17\",\n        \t                \"updated_at\": \"2018-06-28 12:38:17\",\n        \t                \"pivot\": {\n        \t                    \"utilities_id\": 138,\n        \t                    \"tag_id\": 25\n        \t                }\n        \t            }\n                ]\n        \t    ],\n        \t    \"msg\": \"Get success\",\n        \t    \"code\": \"S200\"\n        \t}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "Error",
          "content": "HTTP/1.1 400 Error\n{\n\t\"body\": \"\",\n\t\"msg\": \"Not found\",\n\t\"code\": \"E404\"\n}",
          "type": "json"
        }
      ]
    },
    "filename": "apiDocs/VendingMachineController.php",
    "groupTitle": "VendingMachine"
  }
] });
