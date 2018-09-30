<?php namespace professionalweb\payment\contracts;

/**
 * Interface of payment facade
 * @package professionalweb\payment\contracts
 */
interface PaymentFacade extends PayService
{
    /**
     * Set current driver
     *
     * @param string $name
     *
     * @return $this
     */
    public function setCurrentDriver(string $name): PayService;

    /**
     * Get current driver name
     *
     * @return PayService
     */
    public function getCurrentDriver(): ?PayService;

    /**
     * Get name of current driver
     *
     * @return string
     */
    public function getDriverName(): string;

    /**
     * Register driver
     *
     * @param string $alias
     * @param string $className
     *
     * @return PayService
     */
    public function registerDriver(string $alias, string $className): PayService;

    /**
     * Get available drivers
     *
     * @return array
     */
    public function drivers(): array;
}