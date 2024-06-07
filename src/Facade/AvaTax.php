<?php

namespace OscarTeam\AvaTax\Facade;

use Avalara\AgeVerifyRequest;
use Avalara\AvaTaxClient;
use Avalara\TaxRuleModel;
use Avalara\TransactionBuilder;
use Illuminate\Support\Facades\Facade;
use stdClass;

/**
 * @method static ping()
 *
 * // Account Service Methods
 * @method static createAccount(array $model)
 * @method static deleteAccount(int $id)
 * @method static getAccount(int $id)
 * @method static listAccounts(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryAccounts(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateAccount(int $id, array $model)
 *
 * // Address Service Methods
 * @method static resolveAddressPost(array $model)
 * @method static resolveAddressGet(string $line1, string $line2 = null, string $line3 = null, string $city = null, string $region = null, string $postalCode = null, string $country = null, string $textCase = null)
 *
 * // Batch Service Methods
 * @method static createBatches(array $model)
 * @method static deleteBatch(int $id)
 * @method static getBatch(int $id)
 * @method static listBatches(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryBatches(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateBatch(int $id, array $model)
 *
 * // Certificate Service Methods
 * @method static createCertificates(array $model)
 * @method static deleteCertificate(int $id)
 * @method static getCertificate(int $id)
 * @method static listCertificates(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryCertificates(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateCertificate(int $id, array $model)
 *
 * // Company Service Methods
 * @method static createCompanies(array $model)
 * @method static deleteCompany(int $id)
 * @method static getCompany(int $id)
 * @method static listCompanies(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryCompanies(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateCompany(int $id, array $model)
 *
 * // Filing Service Methods
 * @method static createFilings(array $model)
 * @method static deleteFiling(int $id)
 * @method static getFiling(int $id)
 * @method static listFilings(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryFilings(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateFiling(int $id, array $model)
 *
 * // Item Service Methods
 * @method static createItems(array $model)
 * @method static deleteItem(int $id)
 * @method static getItem(int $id)
 * @method static listItems(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryItems(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateItem(int $id, array $model)
 *
 * // Location Service Methods
 * @method static createLocations(array $model)
 * @method static deleteLocation(int $id)
 * @method static getLocation(int $id)
 * @method static listLocations(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryLocations(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateLocation(int $id, array $model)
 *
 * // Nexus Service Methods
 * @method static createNexus(array $model)
 * @method static deleteNexus(int $id)
 * @method static getNexus(int $id)
 * @method static listNexus(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryNexus(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateNexus(int $id, array $model)
 *
 * // Report Service Methods
 * @method static getReport(string $name, array $model)
 * @method static listReports(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 *
 * // TaxRule Service Methods
 * @method static createTaxRules(int $companyId, array $model)
 * @method static deleteTaxRule(int $companyId, int $id)
 * @method static getTaxRule(int $companyId, int $id)
 * @method static listTaxRules(int $companyId, string $filter = null, string $include = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryTaxRules(string $filter = null, string $include = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateTaxRule(int $companyId, int $id, TaxRuleModel $model)
 *
 * // Transaction Service Methods
 * @method static addLines(string $include = null, array $model)
 * @method static adjustTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static auditTransaction(string $companyCode, string $transactionCode)
 * @method static auditTransactionWithType(string $companyCode, string $transactionCode, string $documentType)
 * @method static bulkLockTransaction(array $model)
 * @method static changeTransactionCode(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static commitTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static createOrAdjustTransaction(string $include = null, array $model)
 * @method static createTransaction(string $include = null, array $model)
 * @method static deleteLines(string $include = null, array $model)
 * @method static getTransactionByCode(string $companyCode, string $transactionCode, string $documentType, string $include = null)
 * @method static getTransactionByCodeAndType(string $companyCode, string $transactionCode, string $documentType, string $include = null)
 * @method static getTransactionById(int $id, string $include = null)
 * @method static listTransactionsByCompany(string $companyCode, int $dataSourceId, string $include = null, string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static lockTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static refundTransaction(string $companyCode, string $transactionCode, string $include = null, string $documentType, bool $useTaxDateOverride, array $model)
 * @method static settleTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static uncommitTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null)
 * @method static unvoidTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null)
 * @method static verifyTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 * @method static voidTransaction(string $companyCode, string $transactionCode, string $documentType, string $include = null, array $model)
 *
 * // User Service Methods
 * @method static createUser(array $model)
 * @method static deleteUser(int $id)
 * @method static getUser(int $id)
 * @method static listUsers(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static queryUsers(string $filter = null, int $top = null, int $skip = null, string $orderBy = null)
 * @method static updateUser(int $id, array $model)
 *
 * // TransactionBuilder
 * @method static TransactionBuilder newTransaction(string $companyCode, string $type, string $customerCode, ?string $dateTime = null)
 *
 * @method static stdClass getMySubscription(int $serviceTypeId)
 * @method static stdClass listMySubscriptions()
 * @method static stdClass findAgeVerification(AgeVerifyRequest $model)
 * @method static stdClass storeAgeVerification($model)
 * @method static stdClass storeIfVerified(?string $simulatedFailureCode, AgeVerifyRequest $model)
 * @method static stdClass verifyAge(?string $simulatedFailureCode, AgeVerifyRequest $model)
 * @method static stdClass deregisterShipment(string $companyCode, string $transactionCode, ?string $documentType, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass registerShipment(string $companyCode, string $transactionCode, ?string $documentType, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass registerShipmentIfCompliant(string $companyCode, string $transactionCode, ?string $documentType, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass verifyShipment(string $companyCode, string $transactionCode, ?string $documentType, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass enqueueBatchDeregistration(string $companyCode, string $batchCode, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass enqueueBatchRegistration(string $companyCode, string $batchCode, ?string $api_version = "", ?string $x_avalara_version = "")
 * @method static stdClass getBatchRegistrationData(?string $accountId)
 *
 * @see \OscarTeam\AvaTax\AvaTax;
 * @see AvaTaxClient
 */
class AvaTax extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'avatax';
    }
}
