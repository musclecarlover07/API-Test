struct AcctInfo: Codable { 
	let acctId: String
	let fName: String
	let lName: String
	let addy: String
	let city: String
	let stateCode: String
	let zip: String
	let phone: String
	let billPlan: String
	let email: String
	
	enum CodingKeys: String, CodingKey { 
		case acctId = "acctid"
		case fName = "fname"
		case lName = "lname"
		case addy = "addy"
		case city = "city"
		case stateCode = "statecode"
		case zip = "zip"
		case phone = "phone"
		case billPlan = "billplan"
		case email = "email"
	}
}