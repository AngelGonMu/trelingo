export const config = {
  docsUrl: 'http://localhost:8000/docs/',
  apiUrl: 'http://localhost:8000/api/',
  modules: {
    customers: {
      parent: 'entities',
      listfields: ['name','type','status','contact_info.phone1','contact_info.email'],
      typefields: ['text','text','select:customertype','select:customerstatus','text','text','text','text','text','text','text','text','text'],
      detailfields: ['name','vat','type','status','address_info.address','address_info.city','address_info.postal_code','address_info.province','address_info.country','contact_info.phone1','contact_info.phone2','contact_info.email','contact_info.web'],
      tabs: ['contacts','todos','quotes','orders','invoices']
    },
    contacts: {
      parent: 'entities',
      listfields: ['name','surname','workplace','contact_info.phone1','contact_info.email'],
      typefields: ['text','text','select:contacttitle','text','text','text','email'],
      detailfields: ['name','surname','title','workplace','contact_info.phone1','contact_info.phone2','contact_info.email'],
      tabs: ['todos','quotes','orders','invoices']
    },
    products: {
      parent: 'production',
      listfields: ['code','name','price_unit','category','subcategory'],
      typefields: ['text','text','select:units','number','select:categories','select:subcategories','textarea'],
      detailfields: ['code','name','unit','price_unit','category','subcategory','description'],
      tabs: ['characteristics','stock']
    },
    services: {
      parent: 'production',
      listfields: ['name','price_unit','category','subcategory'],
      typefields: ['text','select:units','number','select:categories','select:subcategories','textarea'],
      detailfields: ['name','unit','price_unit','category','subcategory','description'],
      tabs: ['characteristics']
    },
    quotes: {
      parent: 'sales',
      listfields: ['code','name','date','due_date','status'],
      typefields: ['text','text','date','date','select:documentstatus','select:currencies','select:taxdiscounttype','number','number','text','text','text','text','text','text','text','text','text'],
      detailfields: ['code','name','date','due_date','status','currency','tdtype','tax','discount','address_info.address','address_info.city','address_info.postal_code','address_info.province','address_info.country','contact_info.phone1','contact_info.phone2','contact_info.email','contact_info.web'],
      tabs: ['lines']
    },
    orders: {
      parent: 'sales',
      listfields: ['code','name','date','due_date','status'],
      typefields: ['text','text','date','date','select:documentstatus','select:currencies','select:taxdiscounttype','number','number','text','text','text','text','text','text','text','text','text'],
      detailfields: ['code','name','date','due_date','status','currency','tdtype','tax','discount','address_info.address','address_info.city','address_info.postal_code','address_info.province','address_info.country','contact_info.phone1','contact_info.phone2','contact_info.email','contact_info.web'],
      tabs: ['lines']
    },
    invoices: {
      parent: 'sales',
      listfields: ['code','name','date','due_date','status'],
      typefields: ['text','text','date','date','select:documentstatus','select:currencies','select:taxdiscounttype','number','number','text','text','text','text','text','text','text','text','text'],
      detailfields: ['code','name','date','due_date','status','currency','tdtype','tax','discount','address_info.address','address_info.city','address_info.postal_code','address_info.province','address_info.country','contact_info.phone1','contact_info.phone2','contact_info.email','contact_info.web'],
      tabs: ['lines','payments']
    },
    todos: {
      parent: '',
      listfields: ['date','type','due_date','description'],
      typefields: ['date','select:todotype','date','text']
    },
    characteristics: {
      parent: '',
      listfields: ['name','description'],
      typefields: ['text','text']
    },
    stock: {
      parent: '',
      listfields: ['date','type','units'],
      typefields: ['date','text','number']
    },
    lines: {
      parent: '',
      listfields: ['sort','product_id','units','price_unit','tax','discount','description'],
      typefields: ['number','select:products','number','number','number','number','text']
    },
    payments: {
      parent: '',
      listfields: ['date','due_date','quantity','description'],
      typefields: ['date','date','number','text']
    },
    preferences: {
      parent: '',
      typefields: ['text','text','text','text','text','text','text','text','text','text','text'],
      detailfields: ['company_name','vat','address_info.address','address_info.city','address_info.postal_code','address_info.province','address_info.country','contact_info.phone1','contact_info.phone2','contact_info.email','contact_info.web'],
      tabs: ['vl','users']
    },
    users: {
      parent: '',
      listfields: ['name','surname','email', 'password', 'environment']
    }
  }
};
