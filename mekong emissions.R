library("xlsx")
library(forecast)
library(TTR)
library("openxlsx")

mydata = read.xlsx("Mekong Countries CO2 emissions.xlsx", sheetName = "Mekong countries")
mydata = mydata[1:55,]

tempActual = mydata
for (i in 1:5) {
  tempActual = rbind(tempActual, c(2014+i, rep("nil",4)))
}

## Cambodia
myts.Cambodia = ts(mydata[2])
plot(myts.Cambodia)

mydata.Cambodia.hw = HoltWinters(myts.Cambodia, gamma=F)
mydata.Cambodia.hw
plot(mydata.Cambodia.hw, xaxt="n", main = "Cambodia (1960-2014)", ylab = "CO2 emissions (metric tons per capita)")
axis(1, at=seq(1,55), labels=mydata$Year)

accuracy(forecast(mydata.Cambodia.hw))

mydata.Cambodia.fitted = fitted(mydata.Cambodia.hw)
newFitted = data.frame(rbind("nil","nil",mydata.Cambodia.fitted)[,1])
a = data.frame(tempActual$Year[1:55], tempActual$Cambodia[1:55], newFitted)
names(a) = c("Years", "Actual CO2 emissions", "Predicted CO2 emissions")

write.xlsx(a, file = "Mekong Emissions Predictions.xlsx", sheetName = "Cambodia", row.names = F)

## Laos
myts.Laos = ts(mydata[3])
plot(myts.Laos)

mydata.Laos.hw = HoltWinters(myts.Laos, gamma=F)
plot(mydata.Laos.hw, xaxt="n", main = "Laos (1960-2014)", ylab = "CO2 emissions (metric tons per capita)")
axis(1, at=seq(1,55), labels=mydata$Year)

accuracy(forecast(mydata.Laos.hw))

mydata.Laos.fitted = fitted(mydata.Laos.hw)
newFitted = data.frame(rbind("nil","nil",mydata.Cambodia.fitted)[,1])
a = data.frame(tempActual$Year[1:55], tempActual$Lao.PDR[1:55], newFitted)
names(a) = c("Years", "Actual CO2 emissions", "Predicted CO2 emissions")

write.xlsx(a, file = "Mekong Emissions Predictions.xlsx", sheetName = "Laos", append = T, row.names = F)


## Myanmar
myts.Myanmar = ts(mydata[4])
plot(myts.Myanmar)

mydata.Myanmar.hw = HoltWinters(myts.Myanmar, gamma=F)
mydata.Myanmar.hw
plot(mydata.Myanmar.hw, xaxt="n", main = "Myanmar (1960-2014)", ylab = "CO2 emissions (metric tons per capita)")
axis(1, at=seq(1,55), labels=mydata$Year)

accuracy(forecast(mydata.Myanmar.hw))

mydata.Cambodia.fitted = fitted(mydata.Cambodia.hw)


mydata.Myanmar.fitted = fitted(mydata.Myanmar.hw)
newFitted = data.frame(rbind("nil","nil",mydata.Myanmar.fitted)[,1])
a = data.frame(tempActual$Year[1:55], tempActual$Myanmar[1:55], newFitted)
names(a) = c("Years", "Actual CO2 emissions", "Predicted CO2 emissions")

write.xlsx(a, file = "Mekong Emissions Predictions.xlsx", sheetName = "Myanmar", append = T, row.names = F)

## Thailand
myts.Thailand = ts(mydata[5])
plot(myts.Thailand)

mydata.Thailand.hw = HoltWinters(myts.Thailand, gamma=F)
mydata.Thailand.hw
plot(mydata.Thailand.hw, xaxt="n", main = "Thailand (1960-2014)", ylab = "CO2 emissions (metric tons per capita)")
axis(1, at=seq(1,55), labels=mydata$Year)

accuracy(forecast(mydata.Thailand.hw))

mydata.Thailand.fitted = fitted(mydata.Thailand.hw)
newFitted = data.frame(rbind("nil","nil",mydata.Thailand.fitted)[,1])
a = data.frame(tempActual$Year[1:55], tempActual$Thailand[1:55], newFitted)
names(a) = c("Years", "Actual CO2 emissions", "Predicted CO2 emissions")

write.xlsx(a, file = "Mekong Emissions Predictions.xlsx", sheetName = "Thailand", append = T, row.names = F)


## Vietnam
myts.Vietnam = ts(mydata[6])
plot(myts.Vietnam)

mydata.Vietnam.hw = HoltWinters(myts.Vietnam, gamma=F)
mydata.Vietnam.hw
plot(mydata.Vietnam.hw, xaxt="n", main = "Vietnam (1960-2014)", ylab = "CO2 emissions (metric tons per capita)")
axis(1, at=seq(1,55), labels=mydata$Year)

accuracy(forecast(mydata.Vietnam.hw))

mydata.Vietnam.fitted = fitted(mydata.Vietnam.hw)
newFitted = data.frame(rbind("nil","nil",mydata.Vietnam.fitted)[,1])
a = data.frame(tempActual$Year[1:55], tempActual$Vietnam[1:55], newFitted)
names(a) = c("Years", "Actual CO2 emissions", "Predicted CO2 emissions")

write.xlsx(a, file = "Mekong Emissions Predictions.xlsx", sheetName = "Vietnam", append = T, row.names = F)

plot(mydata.Myanmar.hw)
plot(forecast(mydata.Myanmar.hw,5))


forecastData = data.frame(forecast(mydata.Cambodia.hw,5))
write.xlsx(forecastData, file = "Mekong Emissions Predictions.xlsx", sheetName = "CambodiaP", append = T, row.names = F)
forecastData = data.frame(forecast(mydata.Laos.hw,5))
write.xlsx(forecastData, file = "Mekong Emissions Predictions.xlsx", sheetName = "LaosP", append = T, row.names = F)
forecastData = data.frame(forecast(mydata.Myanmar.hw,5))
write.xlsx(forecastData, file = "Mekong Emissions Predictions.xlsx", sheetName = "MyanmarP", append = T, row.names = F)
forecastData = data.frame(forecast(mydata.Thailand.hw,5))
write.xlsx(forecastData, file = "Mekong Emissions Predictions.xlsx", sheetName = "ThailandP", append = T, row.names = F)
forecastData = data.frame(forecast(mydata.Vietnam.hw,5))
write.xlsx(forecastData, file = "Mekong Emissions Predictions.xlsx", sheetName = "VietnamP", append = T, row.names = F)

