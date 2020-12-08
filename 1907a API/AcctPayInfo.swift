struct AcctPayInfo: Codable { 
	let lastPayDate: String
	let nextPayDate: String
	let retries: String
	let creditCard: String
	let expirationDate: String
	let cvv: String
	
	enum CodingKeys: String, CodingKey { 
		case lastPayDate = "lastpaydate"
		case nextPayDate = "nextpaydate"
		case retries = "retries"
		case creditCard = "ccard"
		case expirationDate = "expdt"
		case cvv = "cvv"
	}
}